<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use App\Models\contact_reason;
use App\Models\BenefitsOfMember;
use App\Models\Page;
use App\Models\Frontend;
use App\Models\Notice;
use App\Models\scroll_notice;
use App\Models\photoGallaryCategory;
use App\Models\video_notice;
use App\Models\OurMember;
use App\Models\MemberChildren;
use App\Models\setting;
use App\Models\Slider;
use App\Models\total_due;
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
        $scroll_notice=scroll_notice::where('published_date', '<=',$today)->where(function ($query) use ($today) {
                            $query->where('unpublished_date', '>',$today);
                            $query->orWhereNull('unpublished_date');
                        })->latest()->limit(12)->get();
        $vNotice= video_notice::all();
        $facilities=Facilities::get();
        $pgallery_cat=photoGallaryCategory::where('status',1)->get();
        $donor = OurMember::where('membership_applied',1)->count();
        $Service = OurMember::where('membership_applied',2)->count();
        $Life = OurMember::where('membership_applied',3)->count();
        $Temporary = OurMember::where('membership_applied',4)->count();
        $Permanent = OurMember::where('membership_applied',5)->count();
        $Honorary = OurMember::where('membership_applied',6)->count();
        $Corporate = OurMember::where('membership_applied',7)->count();
        $Diplomate = OurMember::where('membership_applied',7)->count();
        $ourMember = OurMember::where('show_font',1)->get();
        $benefit = BenefitsOfMember::latest()->take(6)->get();
        $showViewMoreButton = BenefitsOfMember::count() > 6;
        return view('frontend.home',compact('slider','notice','facilities','pgallery_cat','donor','Service','Life','Temporary','Permanent','Honorary','Corporate','Diplomate','ourMember','benefit','showViewMoreButton','scroll_notice','vNotice'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function benefit()
    {
        $benefit=BenefitsOfMember::all();
        return view('frontend.benefit',compact('benefit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUs()
    {
        $contactReason = contact_reason::all();
        return view('frontend.membership.contact',compact('contactReason'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newsEvents()
    {
        $newsEv = video_notice::paginate(12);
        return view('frontend.notice.newsEvents',compact('newsEv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function nwesSearch(Request $request)
    {
        $search = $request['name']?? "";
        $news = video_notice::query();

        if ($search != "") {
            $news->where('title', 'LIKE', '%'.$search.'%');
        }

        $newsEv = $news->paginate(12);
        return view('frontend.notice.newsEvents', compact('newsEv','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allNotice()
    {
        $today=\Carbon\Carbon::today()->toDateString();

        $notice=Notice::where('published_date', '<=',$today)->where(function ($query) use ($today) {
            $query->where('unpublished_date', '>',$today);
            $query->orWhereNull('unpublished_date');
        })->paginate(20);

        return view('frontend.notice.notice',compact('notice'));
    }
    
    /* get daynamic page */
    public function page($slug)
    {
        $page_data= Page::where('page_slug',"$slug")->where('published',1)->first();
        return view('frontend.Page.index',compact('page_data'));
    }

    /* get daynamic page */
    public function club_dues()
    {
        $founder_data= total_due::where('member_type',1)->get();
        $life_data= total_due::where('member_type',2)->get();
        $perm_data= total_due::where('member_type',3)->get();
        $permter_data= total_due::where('member_type',4)->get();
        return view('frontend.club_dues',compact('founder_data','life_data','perm_data','permter_data'));
    }

    /* get daynamic page */
    public function club_dues_member_type(Request $r)
    {
        $memberType= total_due::all();
        return view('frontend.membership.clubDuesMemberType',compact('memberType'));
    }

    /* get daynamic page */
    public function club_dues_member_search(Request $request)
    {
        $memberType = total_due::all();
        $members = total_due::where('member_type', $request->input('member_type'))
                            ->where('membership_code', $request->input('membership_code'))
                            ->first();
        return view('frontend.membership.clubDuesMember', compact('members', 'memberType'));
    }

    
}
