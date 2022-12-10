<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Exception;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::all();
        return view('slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create');

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
            $slider=new Slider;
            if($request->hasFile('Picture')){
                $PictureName = rand(111,999).time().'.'.$request->Picture->extension();
                $request->Picture->move(public_path('uploads/Slide_image'), $PictureName);
                $slider->image=$PictureName;
            }
            $slider->link=$request->Link;
            $slider->short_title=$request->ShortTitle;
            $slider->long_title=$request->LongTitle;
            if($slider->save())
            return redirect()->route(currentUser().'.slider.index');
            // Toastr::success('Slider Create Successfully!');
        else
            return redirect()->back();
            // Toastr::success('Please try Again!');

        }
        catch (Exception $e){
            dd($e);
            return back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider=Slider::findOrFail(encryptor('decrypt',$id));
        return view('slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $slider=Slider::findOrFail(encryptor('decrypt',$id));
            if($request->hasFile('Picture')){
                $PictureName = rand(111,999).time().'.'.$request->Picture->extension();
                $request->Picture->move(public_path('uploads/Slide_image'), $PictureName);
                $slider->image=$PictureName;
            }
            $slider->link=$request->Link;
            $slider->short_title=$request->ShortTitle;
            $slider->long_title=$request->LongTitle;
            if($slider->save())
            return redirect()->route(currentUser().'.slider.index');
            // Toastr::success('Slider Update Successfully!');
        else
            return redirect()->back();
            // Toastr::success('Please try Again!');

        }
        catch (Exception $e){
            dd($e);
            return back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat= Slider::findOrFail(encryptor('decrypt',$id));
        $cat->delete();
        // Toastr::warning('Slider Deleted Permanently!');
        return redirect()->back();
    }
}
