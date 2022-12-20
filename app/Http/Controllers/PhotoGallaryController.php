<?php

namespace App\Http\Controllers;

use App\Models\photoGallary;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class PhotoGallaryController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pGallery=photoGallary::paginate(10);
        return view('pGallery.index',compact('pGallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pGallery.create');
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
            $pgc=new photoGallary;

            $pgc->Caption=$request->Caption;
            $pgc->publish_date=$request->publish_date;
            $pgc->unpublish_date=$request->unpublish_date;
            $pgc->status=$request->status;
            if($request->has('feature_image'))
                $pgc->feature_image=$this->resizeImage($request->feature_image,'uploads/pGgallery',true,200,200,false);

            if($pgc->save()){
            Toastr::success('Photo Gallery Create Successfully!');
            return redirect()->route(currentUser().'.pGallery.index');
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
     * @param  \App\Models\photoGallary  $photoGallary
     * @return \Illuminate\Http\Response
     */
    public function show(photoGallary $photoGallary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\photoGallary  $photoGallary
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pGallery=photoGallary::findOrFail(encryptor('decrypt',$id));
        return view('pGallery.edit',compact('pGallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\photoGallary  $photoGallary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $pgc= photoGallary::findOrFail(encryptor('decrypt',$id));

            $pgc->Caption=$request->Caption;
            $pgc->publish_date=$request->publish_date;
            $pgc->unpublish_date=$request->unpublish_date;
            $pgc->status=$request->status;
            
            $path='uploads/pGgallery';
            if($request->has('feature_image') && $request->feature_image)
            if($this->deleteImage($pgc->feature_image,$path))
                $pgc->feature_image=$this->resizeImage($request->feature_image,$path,true,200,200,false);
            
            if($pgc->save()){
            Toastr::success('Photo Gallery Updated Successfully!');
            return redirect()->route(currentUser().'.pGallery.index');
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
     * @param  \App\Models\photoGallary  $photoGallary
     * @return \Illuminate\Http\Response
     */
    public function destroy(photoGallary $photoGallary)
    {
        //
    }
}
