<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use App\Models\BenefitsOfMember;
use App\Models\Frontend;
use App\Models\Notice;
use App\Models\photoGallaryCategory;
use App\Models\OurMember;
use App\Models\setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Traits\ImageHandleTraits;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use DB;
class FrontendController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today=\Carbon\Carbon::today()->toDateString();
        $slider=Slider::get();
        $notice=Notice::where('published_date', '<=',$today)->where(function ($query) use ($today) {
                            $query->where('unpublished_date', '>',$today);
                            $query->orWhereNull('unpublished_date');
                        })->latest()->limit(12)->get();
        $facilities=Facilities::get();
        $pgallery_cat=photoGallaryCategory::get();
        //$donor=OurMember::where('membership_applied',1)->latest()->limit(9)->get();
        $donor = OurMember::where('membership_applied',1)->count();
        $Service = OurMember::where('membership_applied',2)->count();
        $Life = OurMember::where('membership_applied',3)->count();
        $Temporary = OurMember::where('membership_applied',4)->count();
        $Permanent = OurMember::where('membership_applied',5)->count();
        $Honorary = OurMember::where('membership_applied',6)->count();
        $Corporate = OurMember::where('membership_applied',7)->count();
        $Diplomate = OurMember::where('membership_applied',7)->count();
        $ourMember = OurMember::where('show_font',1)->get();
        $benefit = BenefitsOfMember::all();
        return view('frontend.home',compact('slider','notice','facilities','pgallery_cat','donor','Service','Life','Temporary','Permanent','Honorary','Corporate','Diplomate','ourMember','benefit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mem_regi()
    {
        return view('frontend.registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mem_regi_store(Request $request)
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
            $member->company=$request->company;
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

            if($request->has('image'))
                $member->image=$this->resizeImage($request->image,'uploads/member_image',true,140,175,false);

            $member->fb_link=$request->fb_link;
            $member->show_font=0;
            $member->order_b=0;
            $member->twter_link=$request->twter_link;
            $member->linkdin_link=$request->linkdin_link;
            $member->youtube_link=$request->youtube_link;
            $member->status=0;
            if($member->save()){
                Toastr::success('our Member Create Successfully!');
                return redirect()->route('member.registration.success',encryptor('encrypt',$member->id));
            }else{
                Toastr::success('Please try Again!');
                return redirect()->back();
            }
        }
        catch (Exception $e){
            Toastr::success('Please try Again!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function mem_regi_success($id)
    {
        $show_data=OurMember::findOrFail(encryptor('decrypt',$id));
        return view('frontend.registration_success',compact('show_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function edit(Frontend $frontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frontend $frontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frontend $frontend)
    {
        //
    }
}
