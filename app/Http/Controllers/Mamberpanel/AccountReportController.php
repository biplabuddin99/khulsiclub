<?php

namespace App\Http\Controllers\Mamberpanel;

use App\Http\Controllers\Controller;

use App\Models\Accounts\GeneralLedger;
use App\Models\Accounts\Child_two;
use App\Models\OnlinePayment;
use App\Models\OurMember;
use Illuminate\Http\Request;

class AccountReportController extends Controller{

    public function statement(Request $r){
        $memberhead=Child_two::where('head_code','1130'.currentUserId())->first();
        $startDate=$endDate=date("Y-m-d");
        
        if($r->current_date){
            $current_date=explode(' / ',$r->current_date);
            $startDate=date('Y-m-d',strtotime($current_date[0]));
            $endDate=date('Y-m-d',strtotime($current_date[1]));
        }
        $opening_bal=$head_id=$table_id_name=$head_code=0;
        $accData=$accOldData=array();
        if($memberhead){
            $head_code=$memberhead->head_code;
            $opening_bal=$memberhead->opening_balance;
            $table_id_name="child_two_id";
            $head_id=$memberhead->id;
        }
        if($head_id){
            $accOldData=Generalledger::where('rec_date', '<',$startDate)->where($table_id_name,$head_id)->orderBy('rec_date')->get();
            $accData=Generalledger::whereBetween('rec_date', [$startDate, $endDate])->where($table_id_name,$head_id)->orderBy('rec_date')->get();
        }
        
        $member=OurMember::where('id',currentUserId())->first();
        return view("frontend.memDashboard.payment.statement",compact("accOldData","accData","opening_bal","startDate","endDate","member"));
    }

    /**
     * Member payment history
     *
     */
    public function onlinePaymentHistory()
    {
        $data = OnlinePayment::where('member_id',currentUserId())->latest()->paginate(10);
        return view('frontend.memDashboard.payment.onlinehistory',compact('data'));
    }
}