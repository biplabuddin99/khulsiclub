<?php

namespace App\Http\Controllers\Mamberpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OurMember;
use App\Models\OnlinePayment;
use Illuminate\Support\Facades\Session;

class sslController extends Controller
{
    public function store(Request $request){
        $user = OurMember::findOrFail(currentUserId());
        $txnid = "SSLCZ_TXN_".uniqid();
        $item_amount = $request->amount;

        //$settings = Generalsetting::findOrFail(1);

      
        $deposit = new OnlinePayment;
        $deposit->member_id = $user->id;
        $deposit->currency = "BDT";
        $deposit->currency_code = "BDT";
        $deposit->amount = $request->amount;
        $deposit->currency_value = 1;
        $deposit->method = 'SSLCommerz';
        $deposit->txnid = $txnid;
        $deposit->save();
        

        $post_data = array();
        $post_data['store_id'] = 'geniu5e1b00621f81e';//$settings->ssl_store_id;
        $post_data['store_passwd'] = 'geniu5e1b00621f81e@ssl';//$settings->ssl_store_password;
        $post_data['total_amount'] = $item_amount;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $txnid;
        $post_data['success_url'] =action([sslController::class, 'notify']);//action ('User\DsslController@notify');
        $post_data['fail_url'] =  action([sslController::class, 'cancel']);//action('User\DsslController@cancle');
        $post_data['cancel_url'] =  action([sslController::class, 'cancel']);//action('User\DsslController@cancle');
        # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE
        
        
        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $user->name;
        $post_data['cus_email'] = $user->email;
        $post_data['cus_add1'] = $user->police_station;
        $post_data['cus_city'] = $user->district;
        $post_data['cus_state'] = $user->district;
        $post_data['cus_postcode'] = $user->postalCode;
        $post_data['cus_country'] = $user->country;
        $post_data['cus_phone'] = $user->cell_number;
        $post_data['cus_fax'] = $user->cell_number;
        
        
        # REQUEST SEND TO SSLCOMMERZ
        //if($settings->ssl_sandbox_check == 1){
            $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";
        //}
        //else{
        //$direct_api_url = "https://securepay.sslcommerz.com/gwprocess/v3/api.php";
       // }


        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_api_url );
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1 );
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC
        
        
        $content = curl_exec($handle );
        
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        
        
        
        
        if($code == 200 && !( curl_errno($handle))) {
            curl_close( $handle);
            $sslcommerzResponse = $content;
        } else {
            curl_close( $handle);
            return redirect()->back()->with('unsuccess',"FAILED TO CONNECT WITH SSLCOMMERZ API");
            exit;
        }
        
        # PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true );
        
        if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
        
             # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
            # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
            echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
            # header("Location: ". $sslcz['GatewayPageURL']);
            exit;
        } else {
            return redirect()->back()->with('unsuccess',"JSON Data parsing error!");
        }

    }


    public function cancel(Request $request){
        $input = $request->all();
        $deposit = OnlinePayment::where('txnid','=',$input['tran_id'])->orderBy('created_at','desc')->first();
        $member = OurMember::findOrFail($deposit->member_id);
        $this->memberSetSession($member);
        \Toastr::warning('Payment Cancelled.');
        return redirect()->route('member.memdashboard');
    }

    
    public function notify(Request $request){
        $cancel_url = action([sslController::class, 'cancel']);
        $input = $request->all();
        if($input['status'] == 'VALID'){
            $deposit = OnlinePayment::where('txnid','=',$input['tran_id'])->orderBy('created_at','desc')->first();
            $member = OurMember::findOrFail($deposit->member_id);
            $this->memberSetSession($member);

            $deposit->status = 1;
            $deposit->save();

            // store in transaction table
            if ($deposit->status == 1) {
                
            }
            \Toastr::success('Payment done!');
            return redirect()->route('member.memdashboard');
        }
        else {
            Toastr::warning('Please try Again!');
            return redirect()->route('member.memdashboard');
        }
    }
    
    public function memberSetSession($member){
        return request()->session()->put(
                [
                    'userId'=>encryptor('encrypt',$member->id),
                    'roleIdentity'=>encryptor('encrypt',$member->role->identity),
                    'email'=>encryptor('encrypt',$member->email),
                    'phone'=>encryptor('encrypt',$member->cell_number),
                    'membership_no'=>encryptor('encrypt',$member->membership_no),
                    'membership_type'=>encryptor('encrypt',$member->membership_applied),
                    'address'=>encryptor('encrypt',$member->perVillage.', '.$member->perPoliceStation.', '.$member->perDistrict.', '.$member->perPostalCode),
                    'status'=>encryptor('encrypt',$member->status),
                    'full_name'=>encryptor('encrypt',$member->full_name),
                    'image'=>encryptor('encrypt',$member->image)
                ]
            );
    }
}