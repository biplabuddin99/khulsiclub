<?php

namespace App\Http\Controllers;

use App\Models\OurMember;
use App\Models\MemberChildren;
use Illuminate\Http\Request;
use App\Http\Traits\ImageHandleTraits;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Exception;

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
    public function memberPassword()
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

            $member->full_name=$request->fullName;
            $member->father_name=$request->Fathers;
            $member->husban_name=$request->husbanName;
            $member->mother_name=$request->mothersName;
            $member->nominee=$request->nominee;
            $member->birth_date=$request->dateOfBirth;
            $member->nationality=$request->nationality;
            $member->profession=$request->profession;
            $member->company=$request->company;
            $member->cell_number=$request->cellno;
            $member->tel_number=$request->tel;
            $member->fax_number=$request->fax;
            $member->email=$request->email;
            $member->role_id=5;

            $member->blood_group=$request->bloodGroup;
            $member->national_id=$request->nationalid;
            $member->qualification=$request->qualification;
            $member->village=$request->vill;
            $member->postoffice=$request->postoffice;
            $member->upazila=$request->upazila;
            $member->district=$request->district;
            $member->present_address=$request->presentAddress;
            $member->office_address=$request->officeAddress;
            $member->others_date=$request->othersdate;
            // $member->signature_applicant=$request->signatureApplicant;
            if($request->hasFile('signatureApplicant')){
                $signatureApplicantName = rand(111,999).time().'.'.$request->signatureApplicant->extension();
                $request->signatureApplicant->move(public_path('uploads/our_member'), $signatureApplicantName);
                $member->signature_applicant=$signatureApplicantName;
            }
            $member->identify_president=$request->identifyPresident;
            $member->member_no=$request->memberNo;
            $member->mr_mis=$request->mrormis;
            $member->other_address=$request->otheraddress;
            if($request->hasFile('signaturefounderpresident')){
                $signaturefounderpresident = rand(1111,9999).time().'.'.$request->signaturefounderpresident->extension();
                $request->signaturefounderpresident->move(public_path('uploads/signature'), $signaturefounderpresident);
                $member->signature_founder_president=$signaturefounderpresident;
            }
            if($request->hasFile('foundervicepresident')){
                $foundervicepresident = rand(11,99).time().'.'.$request->foundervicepresident->extension();
                $request->foundervicepresident->move(public_path('uploads/signature'), $foundervicepresident);
                $member->signature_founder_vicepresident=$foundervicepresident;
            }
            $member->remarks=$request->remarks;
            $member->update_incometax=$request->updateincometax;
            $member->emergency_contact=$request->emergencycontact;
            $member->passport_notype=$request->passportnotype;
            $member->pdate_issue=$request->pdateissue;
            $member->issuing_authority=$request->issuingAuthority;
            $member->validity=$request->validity;
            $member->name_spouse=$request->namespouse;
            $member->occupation_spouse=$request->occupationSpouse;
            $member->membership_applied=$request->categorymembership;
            $member->proposed_name=$request->proposedname;
            $member->membership_no=$request->membershipno;

            $path='uploads/member_image';
            if($request->has('image') && $request->image)
            if($this->deleteImage($member->image,$path))
                $member->image=$this->resizeImage($request->image,$path,true,140,175,false);

            $member->fb_link=$request->fb_link;
            $member->show_font=$request->show_font;
            $member->order_b=$request->order_b;
            $member->twter_link=$request->twter_link;
            $member->linkdin_link=$request->linkdin_link;
            $member->youtube_link=$request->youtube_link;
            if($member->save()){
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
                Toastr::success('Profile Updated Successfully!');
                return redirect()->route('member.registration.success');
            }else{
                Toastr::success('Please try Again!');
                return redirect()->back();
            }
        }
        catch (Exception $e){
            //dd($e);
            return back()->withInput();
            Toastr::success('Please try Again!');

        }

    }
}