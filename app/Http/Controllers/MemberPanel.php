<?php

namespace App\Http\Controllers;

use App\Models\OurMember;
use App\Models\OtherClubDetails;
use App\Models\member_contact;
use App\Models\Banklist;
use App\Models\committee_session;
use App\Models\executive_committee;
use App\Models\MemberChildren;
use App\Models\terms_of_membership;
use Illuminate\Http\Request;
use App\Http\Traits\ImageHandleTraits;
use App\Models\payments;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\DB;

class MemberPanel extends Controller
{
    use ImageHandleTraits;
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function memberProfile()
    {
        
        $member=OurMember::where('id',currentUserId())->first();
        return view('frontend.members.memberProfile',compact('member'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function approveMemberProfile()
    {
        
        $member=OurMember::where('id',currentUserId())->first();
        return view('frontend.memDashboard.profile',compact('member'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function foundingMember()
    {
        
        $foundMember = DB::table('our_members')
                ->join('founding_committees', 'our_members.membership_no', '=', 'founding_committees.member_id')
                ->select('our_members.*')->get();
        return view('frontend.membership.foundingMember',compact('foundMember'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function executiveSession()
    {
        $committeeSession = committee_session::all();
        return view('frontend.membership.committeeSession',compact('committeeSession'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function executiveMember($slug)
    {
        $committeeSession = committee_session::all();
        $session = committee_session::where('id', $slug)->first();
        $exMember = executive_committee::where('committee_sessions_id', $session->id)->get();
        return view('frontend.membership.executiveCommittee', compact('exMember','committeeSession'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function termsConditon()
    {
        $terms = terms_of_membership::latest()->take(1)->first();
        return view('frontend.members.terms',compact('terms'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function memberlist(Request $request, $letter = null)
    {
        $search = $request['name']?? "";
        $memberType = $request['member_type'] ?? "";
        $member_id = $request->input('member_id', '');
        $member_name = $request->input('member_name', '');
        $members = OurMember::query();

        if ($search != "") {
            $members->where('company', 'LIKE', '%'.$search.'%');
        }

        if ($letter) {
            $members->where('company', 'LIKE', $letter.'%');
        }

        if ($memberType != "") {
            $members->where('membership_applied', $memberType);
        }

        if (!empty($member_id) && !empty($member_name)) {
            $members->where(function ($query) use ($member_id, $member_name) {
                $query->where('member_id', $member_id)
                      ->where('given_name', 'LIKE', '%'.$member_name.'%');
            });
        } elseif (!empty($member_id)) {
            $members->where('member_id', $member_id);
        } elseif (!empty($member_name)) {
            $members->where('given_name'.'', 'LIKE', '%'.$member_name.'%');
        }

        $member = $members->paginate(10);
        return view('frontend.membership.memberList', compact('member','search','memberType', 'member_id', 'member_name'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function paymentHistory()
    {
        $data = payments::where('member_id',currentUserId())->paginate(10);
        return view('frontend.memDashboard.payment.history',compact('data'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function changeRequest()
    {
        return view('frontend.memDashboard.request.request');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function helpDesk()
    {
        return view('frontend.memDashboard.help');
    }

    public function memberContactUs(Request $request)
    {
        try{
            $b= new member_contact;
            $b->member_id=$request->member_id;
            $b->reason_id=$request->topic;
            $b->subject=$request->subject;
            $b->message=$request->message;
            if($b->save()){
                return redirect()->back()->withFragment('#contact_us')->with('success','Submited Successfully!');;
            }else{
                return redirect()->back()->withFragment('#contact_us')->with('error','Please try Again!')->withInput();
            }

        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            return back()->withInput();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function bankList()
    {
        $bank= Banklist::all();
        return view('frontend.memDashboard.bank',compact('bank'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    

    public function memberPassword()
    {
        $member=OurMember::where('id',currentUserId())->first();
        return view('frontend.memDashboard.memberPassword',compact('member'));
    }

    public function memPassword()
    {
        $member=OurMember::where('id',currentUserId())->first();
        return view('frontend.members.memberPassword',compact('member'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */

    public function mem_pass_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = OurMember::findOrFail(currentUserId());

        if (!(Hash::check($request->get('current_password'), $user->password))) {
            return redirect()->back()
                ->with('error', 'Your current password does not matches with the password you provided. Please try again.');
        }

        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return redirect()->back()
                ->with('error', 'New Password cannot be same as your current password. Please choose a different password.');
        }

        $user->password = Hash::make($request->get('new_password'));
        $user->save();

        return redirect()->back()
            ->with('success', 'Password changed successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mem_regi_success()
    {
        $show_data=OurMember::findOrFail(currentUserId());
        return view('frontend.members.registration_success',compact('show_data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function memberProfileUpdate(Request $request)
    {
        try{
            $member=OurMember::findOrFail(currentUserId());

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
            $member->nationality=$request->nationality;
            $member->national_id=$request->nationalid;
            $member->passport_no=$request->passportNo;
            $member->blood_group=$request->bloodGroup;
            $member->qualification=$request->qualification;
            $member->name_of_institute=$request->namOfInstitution;
            $member->e_tin_number=$request->tinNo;
            $member->village=$request->vill;
            $member->block=$request->block;
            $member->police_station=$request->policeStation;
            $member->post_office=$request->postoffice;
            $member->postalCode=$request->postalCode;
            $member->district=$request->district;
            $member->country=$request->country;
            $member->perVillage=$request->perVillage;
            $member->perBlock=$request->perBlock;
            $member->perPoliceStation=$request->perPoliceStation;
            $member->perPostOffice=$request->perPostOffice;
            $member->perPostalCode=$request->perPostalCode;
            $member->perDistrict=$request->perDistrict;
            $member->perCountry=$request->perCountry;
            $member->profession=$request->profession;
            $member->designation=$request->designation;
            $member->company=$request->company;
            $member->profVillage=$request->profVillage;
            $member->profBlock=$request->profBlock;
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

            $member->status=$request->status;
            if($member->save()){
                request()->session()->put(
                    [
                        'full_name'=>encryptor('encrypt',$member->full_name),
                        'email'=>encryptor('encrypt',$member->email),
                        'phone'=>encryptor('encrypt',$member->cell_number),
                        'status'=>encryptor('encrypt',$member->status),
                        'address'=>encryptor('encrypt',$member->perVillage.', '.$member->perPoliceStation.', '.$member->perDistrict.', '.$member->perPostalCode),
                    ]);
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
                Toastr::success('Profile Updated Successfully!');
                return redirect()->route('member.registration.success');
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
            }
        }
        catch (Exception $e){
            //dd($e);
            return back()->withInput();
            Toastr::warning('Please try Again!');

        }

    }
}
