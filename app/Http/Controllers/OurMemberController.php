<?php

namespace App\Http\Controllers;

use App\Models\OurMember;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class OurMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourmember=OurMember::paginate(10);
        return view('ourmember.index',compact('ourmember'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ourmember.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $member=new OurMember;

            $member->full_name=$request->fullName;
            $member->father_name=$request->Fathers;
            $member->husban_name=$request->husbanName;
            $member->mother_name=$request->mothersName;
            $member->nominee=$request->nominee;
            $member->birth_date=$request->dateOfBirth;
            $member->nationality=$request->nationality;
            $member->profession=$request->profession;
            $member->cell_number=$request->cellno;
            $member->tel_number=$request->tel;
            $member->fax_number=$request->fax;
            $member->email=$request->email;
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
            $member->childresns_name1=$request->Name1;
            $member->childresns_name2=$request->Name2;
            $member->childresns_name3=$request->Name3;
            $member->childresns_name4=$request->Name4;
            $member->childresns_name5=$request->Name5;
            $member->gender1=$request->gender1;
            $member->gender2=$request->gender2;
            $member->gender3=$request->gender3;
            $member->gender4=$request->gender4;
            $member->gender5=$request->gender5;
            $member->birth_date1=$request->birth_date1;
            $member->birth_date2=$request->birth_date2;
            $member->birth_date3=$request->birth_date3;
            $member->birth_date4=$request->birth_date4;
            $member->birth_date5=$request->birth_date5;
            $member->occupation1=$request->occupation1;
            $member->occupation2=$request->occupation2;
            $member->occupation3=$request->occupation3;
            $member->occupation4=$request->occupation4;
            $member->occupation5=$request->occupation5;
            $member->proposed_name=$request->proposedname;
            $member->membership_no=$request->membershipno;
            if($member->save()){
            Toastr::success('our Member Create Successfully!');
            return redirect()->route(currentUser().'.ourMember.index');
            }else{
            Toastr::success('Please try Again!');
            return redirect()->back();
            }

        }
        catch (Exception $e){
            Toastr::success('Please try Again!');
            dd($e);
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
        $show_data=OurMember::findOrFail(encryptor('decrypt',$id));
        return view('ourmember.show',compact('show_data'));
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
        return view('ourmember.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OurMember  $ourMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $member=OurMember::findOrFail(encryptor('decrypt',$id));

            $member->full_name=$request->fullName;
            $member->father_name=$request->Fathers;
            $member->husban_name=$request->husbanName;
            $member->mother_name=$request->mothersName;
            $member->nominee=$request->nominee;
            $member->birth_date=$request->dateOfBirth;
            $member->nationality=$request->nationality;
            $member->profession=$request->profession;
            $member->cell_number=$request->cellno;
            $member->tel_number=$request->tel;
            $member->fax_number=$request->fax;
            $member->email=$request->email;
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
            if($member->save()){
            Toastr::success('our Member Update Successfully!');
            return redirect()->route(currentUser().'.ourMember.index');
            }else{
            Toastr::success('Please try Again!');
            return redirect()->back();
            }
        }
        catch (Exception $e){
            dd($e);
            return back()->withInput();
            // Toastr::success('Please try Again!');

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
