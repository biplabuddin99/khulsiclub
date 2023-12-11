<?php

namespace App\Http\Controllers\Mamberpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurMember; // custome
use App\Models\OnlinePayment; // custome
use DB;

class DashboardController extends Controller
{
    /*
    * member dashboard
    */
    public function memberDashboard(){
        $user=OurMember::findOrFail(currentUserId());
        if (in_array($user->status, [2,3])) {
            return redirect()->back();
        }
        return view('frontend.members.member');
    }
    /*
    * member dashboard
    */
    public function memDashboard(){
        $due=DB::select("SELECT sum( dr - cr ) as due FROM `general_ledgers` WHERE `child_two_id`=(select id from child_twos WHERE child_twos.head_code='1130".currentUserId()."')");
        $online_payment=OnlinePayment::where("status",1)->sum('amount');
        return view('frontend.memDashboard.member',compact('due','online_payment'));
    }
}
