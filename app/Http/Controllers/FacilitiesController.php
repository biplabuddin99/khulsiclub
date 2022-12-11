<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities=Facilities::paginate(10);
        return view('facilities.index',compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facilities.create');
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
            $facilities=new Facilities;
            $facilities->title=$request->title;
            if($request->hasFile('Picture')){
                $PictureName = rand(111,999).time().'.'.$request->Picture->extension();
                $request->Picture->move(public_path('uploads/facilities'), $PictureName);
                $facilities->image=$PictureName;
            }
            $facilities->details=$request->Details;
            $facilities->save();
            Toastr::success('Facilities Create Successfully!');
            return redirect()->route(currentUser().'.facilities.index');
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
     * @param  \App\Models\Facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function show(Facilities $facilities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faci=Facilities::findOrFail(encryptor('decrypt',$id));
        return view('facilities.edit',compact('faci'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try{
            $facilities=Facilities::findOrFail(encryptor('decrypt',$id));
            $facilities->title=$request->title;
            if($request->hasFile('Picture')){
                $PictureName = rand(111,999).time().'.'.$request->Picture->extension();
                $request->Picture->move(public_path('uploads/facilities'), $PictureName);
                $facilities->image=$PictureName;
            }
            $facilities->details=$request->Details;
            if($facilities->save()){
                Toastr::success('Facilities Update Successfully!');
            return redirect()->route(currentUser().'.facilities.index');
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat= Facilities::findOrFail(encryptor('decrypt',$id));
        $cat->delete();
        Toastr::warning('Facilities Deleted Permanently!');
        return redirect()->back();
    }
}
