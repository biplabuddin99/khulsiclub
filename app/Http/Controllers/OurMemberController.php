<?php

namespace App\Http\Controllers;

use App\Classes\sslSms;
use App\Models\OurMember;
use App\Models\MemberChildren;
use App\Models\OtherClubDetails;
use App\Models\SendSms;
use Illuminate\Http\Request;
use App\Http\Requests\OurMember\AddNewRequest;
use App\Http\Requests\OurMember\UpdateRequest;
use App\Http\Traits\ImageHandleTraits;
use App\Models\MembershipType;
use App\Models\Settings\Location\Country;
use App\Models\Settings\Location\District;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class OurMemberController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourmember=OurMember::whereNot('status',2)->paginate(10);
        return view('ourmember.index',compact('ourmember'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approvedMember(Request $request)
    {
        $ourmember=OurMember::orderBy('id');
        $member=OurMember::where('status',2)->get();
        $mType=MembershipType::all();

        if($request->member_id)
            $ourmember=$ourmember->where('membership_no','like','%'.$request->member_id.'%');
        if($request->mobile)
            $ourmember=$ourmember->where('cell_number','like','%'.$request->mobile.'%');
        if($request->member_type)
            $ourmember=$ourmember->where('membership_applied',$request->member_type);
        if($request->nane)
            $ourmember=$ourmember->where('id',$request->nane);

        $ourmember=$ourmember->where('status',2)->paginate(10);
        return view('ourmember.approveMember',compact('ourmember','member','mType'));
    }

    public function smsToMember()
    {
        $ourmember=OurMember::select('id','given_name','surname','membership_no','membership_applied','cell_number')->where('status',2)->with('membership_type')->get();
        return view('ourmember.smsMember',compact('ourmember'));
    }

    public function sendSmsToMember(Request $request){
        try {
            $success=0;
            $error=0;
           if($request->member_id){
               foreach ($request->member_id as $memberId) {
                   $member = OurMember::where('id', $memberId)->first();
                   $smsClass = new sslSms();
                   $phone = $member->cell_number;
                   $rand = uniqid() . rand(1000, 9999);
                   $msg_text= $request->sms;

                   $checksendsms=$smsClass->singleSms($phone, $msg_text, $rand);
                   if ($checksendsms) {
                       $sendHistory = new SendSms;
                       $sendHistory->phonenumber = $member->cell_number;
                       $sendHistory->sms = $request->sms;
                       $sendHistory->save();
                       $success++;
                   } else {
                       $error++;
                   }
               }
               if($success > 0){
                   Toastr::success('Sms Send Successfully!');
                   return redirect()->route(currentUser().'.sms_to_member');
               }else{
                   Toastr::error('Failed to send SMS!');
                   return back()->withInput();
               }
           }else{
               Toastr::error('Select member first');
                   return back()->withInput();
           }
       } catch (\Exception $e) {
           Toastr::warning('Please try Again!');
           return back()->withInput();
       }
   }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::all();
        $district = District::all();
        $memberType = MembershipType::all();
        return view('ourmember.create',compact('memberType','country','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewRequest $request)
    {
        try{
            $member=new OurMember;

            $member->given_name=$request->given_name;
            $member->surname=$request->surname;
            $member->father_name=$request->Fathers;
            $member->mother_name=$request->mothersName;
            $member->marital_status=$request->marit_status;
            $member->anniversary=$request->anniversary;
            $member->name_of_spouse=$request->namespouse;
            $member->occupation_of_spouse=$request->occupation_spouse;
            $member->birth_date=$request->dateOfBirth;
            $member->place_of_birth=$request->placeOfBirth;
            $member->cell_number=$request->cellno;
            $member->tel_number=$request->tel;
            $member->email=$request->emailAddress;
            $member->password=Hash::make($request->password);
            $member->nationality=$request->nationality;
            $member->national_id=$request->nationalid;
            $member->passport_no=$request->passportNo;
            $member->blood_group=$request->bloodGroup;
            $member->qualification=$request->qualification;
            $member->name_of_institute=$request->namOfInstitution;
            $member->e_tin_number=$request->tinNo;
            $member->village=$request->vill;
            $member->block=$request->block;
            $member->address=$request->address;
            $member->police_station=$request->policeStation;
            $member->post_office=$request->postoffice;
            $member->postalCode=$request->postalCode;
            $member->district=$request->district;
            $member->country=$request->country;
            $member->perVillage=$request->perVillage;
            $member->perBlock=$request->perBlock;
            $member->perAddress=$request->perAddress;
            $member->perPoliceStation=$request->perPoliceStation;
            $member->perPostOffice=$request->perPostOffice;
            $member->perPostalCode=$request->perPostalCode;
            $member->perDistrict=$request->perDistrict;
            $member->perCountry=$request->perCountry;
            $member->profession=$request->profession;
            $member->designation=$request->designation;
            $member->company=$request->company;
            $member->nominee_name=$request->nominee_name;
            $member->nominee_relation=$request->nominee_relation;
            $member->nominee_occupation=$request->nominee_occupation;
            $member->nominee_date_of_birth=$request->nominee_date_of_birth;
            $member->nominee_place=$request->nominee_place;
            $member->nominee_email=$request->nominee_email;
            $member->nominee_phone=$request->nominee_phone;
            $member->nominee_nid_no=$request->nominee_nid_no;
            $member->nominee_passport_no=$request->nominee_passport_no;
            $member->profVillage=$request->profVillage;
            $member->profBlock=$request->profBlock;
            $member->profAddress=$request->profAddress;
            $member->profPoliceStation=$request->profPoliceStation;
            $member->profPostOffice=$request->profPostOffice;
            $member->profPostalCode=$request->profPostalCode;
            $member->profDistrict=$request->profDistrict;
            $member->profCountry=$request->profCountry;
            $member->membership_applied=$request->categorymembership;
            $member->proposed_name=$request->proposedname;
            $member->proposed_membership_id=$request->memberNo;

            $member->role_id=5;

            // if($request->has('image'))
            //     $member->image=$this->resizeImage($request->image,'uploads/member_image',true,140,175,false);

            if($request->hasFile('image')){
                $data = rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/member_image'), $data);
                $member->image=$data;
            }

            if($request->hasFile('nid')){
                $data = rand(111,999).time().'.'.$request->nid->extension();
                $request->nid->move(public_path('uploads/nid'), $data);
                $member->nid=$data;
            }
            if($request->hasFile('passport')){
                $data = rand(111,999).time().'.'.$request->passport->extension();
                $request->passport->move(public_path('uploads/passport'), $data);
                $member->passport=$data;
            }
            if($request->hasFile('etin')){
                $data = rand(111,999).time().'.'.$request->etin->extension();
                $request->etin->move(public_path('uploads/etin'), $data);
                $member->etin=$data;
            }

            if($request->hasFile('nominee_photo')){
                $data = rand(111,999).time().'.'.$request->nominee_photo->extension();
                $request->nominee_photo->move(public_path('uploads/nominee'), $data);
                $member->nominee_photo=$data;
            }
           
            $member->show_font=0;
            $member->status=1;
            if($member->save()){
                if($request->cname){
                    foreach($request->cname as $i=>$cname){
                        if($cname){
                            $mc=new MemberChildren;
                            $mc->member_id=$member->id;
                            $mc->name=$cname;
                            $mc->gender=$request->cgender[$i];
                            $mc->birth_date=$request->cbirth_date[$i];
                            $mc->occupation=$request->coccupation[$i];
                            $mc->save();
                        }
                    }
                }
                if($request->clubName){
                    foreach($request->clubName as $i=>$clubName){
                        if($clubName){
                            $mcl=new OtherClubDetails;
                            $mcl->member_id=$member->id;
                            $mcl->name=$clubName;
                            $mcl->membership_type=$request->membershipType[$i];
                            $mcl->year=$request->year[$i];
                            $mcl->save();
                        }
                    }
                }
            Toastr::success('our Member Create Successfully!');
            return redirect()->route(currentUser().'.ourMember.index');
            }else{
            Toastr::warning('Please try Again!');
            return redirect()->back();
            }

        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            // dd($e);
            return back()->withInput();

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OurMember  $ourMember
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $memberType = MembershipType::all();
        $show_data=OurMember::findOrFail(encryptor('decrypt',$id));
        return view('ourmember.show',compact('show_data','memberType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OurMember  $ourMember
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member=OurMember::findOrFail(encryptor('decrypt',$id));
        $country = Country::all();
        $district = District::all();
        $memberType = MembershipType::all();
        return view('ourmember.edit',compact('member','memberType','country','district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OurMember  $ourMember
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $member=OurMember::findOrFail(encryptor('decrypt',$id));

            $member->given_name=$request->given_name;
            $member->surname=$request->surname;
            $member->father_name=$request->Fathers;
            $member->mother_name=$request->mothersName;
            $member->marital_status=$request->marit_status;
            $member->anniversary=$request->anniversary;
            $member->name_of_spouse=$request->namespouse;
            $member->occupation_of_spouse=$request->occupation_spouse;
            $member->birth_date=$request->dateOfBirth;
            $member->place_of_birth=$request->placeOfBirth;
            $member->cell_number=$request->cellno;
            $member->tel_number=$request->tel;
            $member->email=$request->emailAddress;
            if($request->has('password') && $request->password)
                $member->password=Hash::make($request->password);
            $member->nationality=$request->nationality;
            $member->national_id=$request->nationalid;
            $member->passport_no=$request->passportNo;
            $member->blood_group=$request->bloodGroup;
            $member->qualification=$request->qualification;
            $member->name_of_institute=$request->namOfInstitution;
            $member->e_tin_number=$request->tinNo;
            $member->village=$request->vill;
            $member->block=$request->block;
            $member->address=$request->address;
            $member->police_station=$request->policeStation;
            $member->post_office=$request->postoffice;
            $member->postalCode=$request->postalCode;
            $member->district=$request->district;
            $member->country=$request->country;
            $member->perVillage=$request->perVillage;
            $member->perBlock=$request->perBlock;
            $member->perAddress=$request->perAddress;
            $member->perPoliceStation=$request->perPoliceStation;
            $member->perPostOffice=$request->perPostOffice;
            $member->perPostalCode=$request->perPostalCode;
            $member->perDistrict=$request->perDistrict;
            $member->perCountry=$request->perCountry;
            $member->profession=$request->profession;
            $member->designation=$request->designation;
            $member->company=$request->company;
            $member->nominee_name=$request->nominee_name;
            $member->nominee_relation=$request->nominee_relation;
            $member->nominee_occupation=$request->nominee_occupation;
            $member->nominee_date_of_birth=$request->nominee_date_of_birth;
            $member->nominee_place=$request->nominee_place;
            $member->nominee_email=$request->nominee_email;
            $member->nominee_phone=$request->nominee_phone;
            $member->nominee_nid_no=$request->nominee_nid_no;
            $member->nominee_passport_no=$request->nominee_passport_no;
            $member->profVillage=$request->profVillage;
            $member->profBlock=$request->profBlock;
            $member->profAddress=$request->profAddress;
            $member->profPoliceStation=$request->profPoliceStation;
            $member->profPostOffice=$request->profPostOffice;
            $member->profPostalCode=$request->profPostalCode;
            $member->profDistrict=$request->profDistrict;
            $member->profCountry=$request->profCountry;
            $member->membership_applied=$request->categorymembership;
            $member->proposed_name=$request->proposedname;
            $member->proposed_membership_id=$request->memberNo;

            $path='uploads/member_image';
            if($request->hasFile('image')){
                $this->deleteImage($member->image,$path);
                $data = rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/member_image'), $data);
                $member->image=$data;
            }

            $path2='uploads/nid';
            if($request->hasFile('nid')){
                $this->deleteImage($member->nid,$path2);
                $data = rand(111,999).time().'.'.$request->nid->extension();
                $request->nid->move(public_path('uploads/nid'), $data);
                $member->nid=$data;
            }

            $path3='uploads/passport';
            if($request->hasFile('passport')){
                $this->deleteImage($member->passport,$path3);
                $data = rand(111,999).time().'.'.$request->passport->extension();
                $request->passport->move(public_path('uploads/passport'), $data);
                $member->passport=$data;
            }

            $path4='uploads/etin';
            if($request->hasFile('etin')){
                $this->deleteImage($member->etin,$path4);
                $data = rand(111,999).time().'.'.$request->etin->extension();
                $request->etin->move(public_path('uploads/etin'), $data);
                $member->etin=$data;
            }

            $path5='uploads/nominee';
            if($request->hasFile('nominee_photo')){
                $this->deleteImage($member->nominee_photo,$path5);
                $data = rand(111,999).time().'.'.$request->nominee_photo->extension();
                $request->nominee_photo->move(public_path('uploads/nominee'), $data);
                $member->nominee_photo=$data;
            }

            $member->show_font=$request->show_font;
            $member->club_designation=$request->club_designation;
            $member->membership_no=$request->membershipno;
            $member->status=$request->status;

            
            if($member->save()){
                if($request->status==2){
                    $member->member_id='0'.Carbon::now()->format('y'). str_pad((OurMember::whereYear('created_at', Carbon::now()->year)->where('status',2)->count() + 1),3,"0",STR_PAD_LEFT);
                    // if($member->sms_send !=1 ){ /** check member sms send before or not */
                    //     $smsClass= new sslSms();
                    //     if($member->cell_number){
                    //         $phone=$member->cell_number;
                    //         $rand=uniqid().rand(1000,9999);
                    //         $msg_text="Dear ".$member->full_name.",\n\nYour application has been approved.".$member->membership_no." is your member ID.\n\nThank you\nChittagong Khulshi Club Limited.";
                    //         if($smsClass->singleSms($phone, $msg_text, $rand)->status_code=="200"){
                    //             /* update member sms send status */
                    //             $member->sms_send=1;
                    //             $member->save();
                    //         }
                    //     }
                    // }
                    //$body = "Dear ".$member->full_name.",\n\nYour application has been approved.".$member->membership_no." is your member ID.\n\nThank you\nChittagong Khulshi Club Limited.";
                    $title = 'Approval Status';
                    $data = [
                        'name' => $member->full_name,
                        'member_id' => $member->membership_no,
                        'title' => $title,
                    ];
                    Mail::to($member->email)->send(new WelcomeMail($data));
                    $member->save();
                }else{
                    $member->member_id = null;
                    $member->save();
                }
                if($request->cname){
                    foreach($request->cname as $i=>$cname){
                        if($cname){
                            if($request->id[$i])
                                $mc=MemberChildren::find($request->id[$i]);
                            else
                                $mc=new MemberChildren;
                                $mc->member_id=$member->id;
                                $mc->name=$cname;
                                $mc->gender=$request->cgender[$i];
                                $mc->birth_date=$request->cbirth_date[$i];
                                $mc->occupation=$request->coccupation[$i];
                                $mc->save();
                        }
                    }
                }
                if($request->clubName){
                    OtherClubDetails::where('member_id',$member->id)->delete();
                    foreach($request->clubName as $i=>$clubName){
                        if($request->clubName[$i]>0){
                            $mcl=new OtherClubDetails;
                            $mcl->member_id=$member->id;
                            $mcl->name=$clubName;
                            $mcl->membership_type=$request->membershipType[$i];
                            $mcl->year=$request->year[$i];
                            $mcl->save();
                        }
                    }
                }
                if ($request->status == 2) {
                    return redirect()->route(currentUser() . '.approve_member');
                } else {
                    return redirect()->route(currentUser() . '.ourMember.index');
                }
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
            }
        }
        catch (Exception $e){
            dd($e);
            return back()->withInput();
            Toastr::warning('Please try Again!');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OurMember  $ourMember
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat= OurMember::findOrFail(encryptor('decrypt',$id));
        $cat->delete();
        Toastr::warning('Member Deleted Permanently!');
        return redirect()->back();
    }
}
