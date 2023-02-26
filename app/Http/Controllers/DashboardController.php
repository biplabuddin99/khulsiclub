<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /*
    * admin dashboard
    */
    public function adminDashboard(){
        return view('dasbhoard.admin');
    }

    /*
    * owner dashboard
    */
    public function ownerDashboard(){
        return view('dasbhoard.owner');
    }
    
    /*
    * sales manager dashboard
    */
    public function salesmanagerDashboard(){
        return view('dasbhoard.salesmanager');
    }

    /*
    * sales man dashboard
    */
    public function salesmanDashboard(){
        return view('dasbhoard.salesman');
    }
    /*
    * member dashboard
    */
    public function memberDashboard(){
        return view('frontend.members.member');
    }
    /*
    * member dashboard
    */
    public function memDashboard(){
        return view('frontend.memDashboard.member');
    }
}
