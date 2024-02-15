<?php

namespace App\Http\Controllers\Mamberpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OurMember;
use App\Models\CRM\OnlinePayment;
use App\Models\CRM\MemberInvoice;
use App\Models\Accounts\MemberVoucher;
use App\Models\Accounts\MemberVoucherBkdn;
use App\Models\Accounts\GeneralLedger;
use App\Models\Accounts\GeneralVoucher;
use App\Models\Accounts\Child_two;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;
use App\Classes\sslSms;
use Illuminate\Support\Facades\DB;
use Exception;

class sslSingleController extends Controller
{
    public function store($invid,Request $request){
        $user = OurMember::findOrFail(currentUserId());
        $txnid = "SSLCZ_TXN_".uniqid();
        $member_due=MemberInvoice::where('id',$invid)->where('status',0)->first();

        $item_amount = $member_due->total_amount;

        $deposit = new OnlinePayment;
        $deposit->member_id = $user->id;
        $deposit->currency = "BDT";
        $deposit->currency_code = "BDT";
        $deposit->amount = $item_amount;
        $deposit->currency_value = 1;
        $deposit->method = 'SSLCommerz';
        $deposit->txnid = $txnid;
        $deposit->invoice_id = $member_due->id;
        $deposit->save();
        

        $post_data = array();
        $post_data['store_id'] = 'geniu5e1b00621f81e';//$settings->ssl_store_id;
        $post_data['store_passwd'] = 'geniu5e1b00621f81e@ssl';//$settings->ssl_store_password;
        $post_data['total_amount'] = $item_amount;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $txnid;
        $post_data['success_url'] =action([sslSingleController::class, 'notify']);//action ('User\DsslController@notify');
        $post_data['fail_url'] =  action([sslSingleController::class, 'cancel']);//action('User\DsslController@cancle');
        $post_data['cancel_url'] =  action([sslSingleController::class, 'cancel']);//action('User\DsslController@cancle');
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
        Toastr::warning('Payment Cancelled.');
        return redirect()->route('member.member_invoice_view',$deposit->member_id);
    }

    
    public function notify(Request $request){
        $cancel_url = action([sslSingleController::class, 'cancel']);
        $input = $request->all();
        if($input['status'] == 'VALID'){
            $deposit = OnlinePayment::where('txnid','=',$input['tran_id'])->orderBy('created_at','desc')->first();
            $member = OurMember::findOrFail($deposit->member_id);
            $this->memberSetSession($member);

            $deposit->status = 1;
            $deposit->save();

            // store in transaction table
            if ($deposit->status == 1) {
                $this->invoice_payment($deposit->invoice_id,$deposit->txnid);

                if($deposit->sms_send !=1 ){ /** check member sms send before or not */
                    $smsClass= new sslSms();
                    if($member->cell_number){
                        $phone=$member->cell_number;
                        $rand=$deposit->txnid;
                        $msg_text="Dear LM-0001,\n\nYour payment of BDT ".$deposit->amount." has been received successfully.\n\nThank you\nChittagong Khulshi Club Limited.";
                        if($smsClass->singleSms($phone, $msg_text, $rand)->status_code=="200"){
                            /* update member sms send status */
                            $deposit->sms_send=1;
                            $deposit->save();
                        }
                    }
                }

            }
            Toastr::success('Payment done!');
            return redirect()->route('member.member_invoice_view',$deposit->member_id);
        }
        else {
            return redirect($cancel_url);
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

    public function create_voucher_no(){
		$voucher_no="";
		$query = GeneralVoucher::latest()->first();
		if(!empty($query)){
		    $voucher_no = $query->voucher_no;
			$voucher_no+=1;
			$gv=new GeneralVoucher;
			$gv->voucher_no=$voucher_no;
			if($gv->save())
				return $voucher_no;
			else
				return $voucher_no="";
		}else {
			$voucher_no=10000001;
			$gv=new GeneralVoucher;
			$gv->voucher_no=$voucher_no;
			if($gv->save())
				return $voucher_no;
			else
				return $voucher_no="";
		}
    }

    /* payment invoice voucher */
    public function invoice_payment($id,$txnid)
    {
        DB::beginTransaction();
        try{
            $commitflag=0;

            $voucher_no = $this->create_voucher_no();
            if(!empty($voucher_no)){
                $fee= MemberInvoice::find($id);

                $jv=new MemberVoucher;
                $jv->voucher_no=$voucher_no;
                $jv->member_id=$fee->member_id;
                $jv->txnid=$txnid;

                $jv->current_date=\Carbon\Carbon::now()->format('Y-m-d');

                $jv->eyear=$fee->year;
                $jv->emonth=$fee->month;
                $jv->pay_name="";
                $jv->purpose=$fee->purpose." Payment";
                $jv->credit_sum=$fee->total_amount;
                $jv->debit_sum=$fee->total_amount;
                $jv->created_by=currentUserId();
                if($jv->save()){
                    /* debit side */
                    $jvb=new MemberVoucherBkdn;
                    $jvb->member_id=$fee->member_id;
                    $jvb->eyear=$fee->year;
                    $jvb->emonth=$fee->month;
                    $jvb->member_voucher_id=$jv->id;
                    $jvb->particulars="Received from";
                    $jvb->account_code="1121-Online Payment";
                    $jvb->table_name="child_twos";
                    $jvb->table_id="27";
                    $jvb->debit=$fee->total_amount;
                    if($jvb->save()){
                        $gl=new GeneralLedger;
                        $gl->member_voucher_id=$jv->id;
                        $gl->journal_title=$jvb->account_code;
                        $gl->purpose=$jv->purpose;
                        $gl->rec_date=$jv->current_date;
                        $gl->jv_id=$voucher_no;
                        $gl->member_voucher_bkdn_id=$jvb->id;
                        $gl->created_by=currentUserId();
                        $gl->dr=$fee->total_amount;
                        $gl->child_two_id="27";
                        $gl->save();
                    }
                    
                    
                    /* credit side */
                    $headdata=Child_two::where('head_code',"1130".$fee->member_id)->first();
                    
                    $jvb=new MemberVoucherBkdn;
                    $jvb->member_id=$fee->member_id;
                    $jvb->eyear=$fee->year;
                    $jvb->emonth=$fee->month;
                    $jvb->member_voucher_id=$jv->id;
                    $jvb->particulars="Due Payment";
                    $jvb->account_code=$headdata->head_code.'-'.$headdata->head_name;
                    $jvb->table_name="child_twos";
                    $jvb->table_id=$headdata->id;
                    $jvb->credit=$fee->total_amount;
                    if($jvb->save()){
                        $gl=new GeneralLedger;
                        $gl->member_voucher_id=$jv->id;
                        $gl->journal_title=$jvb->account_code;
                        $gl->purpose=$jv->purpose;
                        $gl->rec_date=$jv->current_date;
                        $gl->jv_id=$voucher_no;
                        $gl->member_voucher_bkdn_id=$jvb->id;
                        $gl->created_by=currentUserId();
                        $gl->cr=$fee->total_amount;
                        $gl->child_two_id=$jvb->table_id;
                        $gl->save();
                        $commitflag=1;
                    }
                    
                    /* update jv id to invice details table */
                    $fee->status=1;
                    $fee->jv_id=$jv->id;
                    $fee->save();
                }
                
                if($commitflag==1){
                    DB::commit();
                    //Toastr::success('Update Successfully!');
                    return true;
                }else{
                    DB::rollback();
                    //Toastr::warning('Please try Again!');
                    return false;
                }
            }else{
                //Toastr::warning('Please try Again!');
                return false;
            }
        }catch (Exception $e){
            DB::rollback();
            //Toastr::warning('Please try Again!');
            // dd($e);
            return false;

        }
    }
}