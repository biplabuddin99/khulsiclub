<?php

namespace App\Http\Controllers;

use App\Models\payments;
use App\Models\Payment_purpose;
use App\Models\OurMember;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = payments::paginate(10);
        return view('payments.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ppurpose = Payment_purpose::all();
        $members = OurMember::all();
        return view('payments.create',compact('ppurpose','members'));
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
            $b= new payments;
            $b->member_id=$request->member_id;
            $b->purpose_id=$request->purpose_id;
            $b->apply_date= now();
            $b->invoice_id=$request->invoice_id;
            if($b->save()){
                Toastr::success('Created Successfully!');
                return redirect()->route(currentUser().'.payment.index');
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
            }

        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show(payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ppurpose = Payment_purpose::all();
        $members = OurMember::all();
        $payments = payments::findOrFail(encryptor('decrypt',$id));
        return view('payments.edit',compact('ppurpose','members','payments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $b= payments::findOrFail(encryptor('decrypt',$id));
            $b->member_id=$request->member_id;
            $b->purpose_id=$request->purpose_id;
            $b->invoice_id=$request->invoice_id;
            $b->status=$request->status;
            if($b->save()){
                Toastr::success('Update Successfully!');
                return redirect()->route(currentUser().'.payment.index');
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
            }

        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b= payments::findOrFail(encryptor('decrypt',$id));
        if($b->delete()){
            Toastr::success('Deleted Successfully!');
        }else{
            Toastr::warning('Please try Again!');
        }
        return redirect()->back();
    }
}
