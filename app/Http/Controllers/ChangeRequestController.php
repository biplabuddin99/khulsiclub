<?php

namespace App\Http\Controllers;

use App\Models\change_request;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class ChangeRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = change_request::paginate(10);
        return view('changeRequest.index',compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pendingRequest()
    {
        $data = change_request::where('member_id',currentUserId())->where('status',0)->get();
        return view('frontend.memDashboard.request.index',compact('data'));
    }

    public function requetHistory()
    {
        $data = change_request::where('member_id',currentUserId())->where('status',1)->get();
        return view('frontend.memDashboard.request.history',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $b= new change_request;
            $b->member_id=$request->member_id;
            $b->change_type = implode(', ', $request->input('changeType', []));
            $b->date= now();
            $b->mobile=$request->mobile;
            $b->email=$request->email;
            $b->address=$request->address;
            $b->member_type=$request->memberType;
            $b->details=$request->details;
            if($b->save()){
                return redirect()->route(currentUser().'.pending_request')->with('success','Submited Successfully!');;
            }else{
                return redirect()->back()->with('error','Please try Again!')->withInput();
            }
        }
        catch (Exception $e){
            dd($e);
            Toastr::warning('Please try Again!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\change_request  $change_request
     * @return \Illuminate\Http\Response
     */
    public function show(change_request $change_request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\change_request  $change_request
     * @return \Illuminate\Http\Response
     */
    public function edit(change_request $change_request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\change_request  $change_request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, change_request $change_request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\change_request  $change_request
     * @return \Illuminate\Http\Response
     */
    public function destroy(change_request $change_request)
    {
        //
    }
}
