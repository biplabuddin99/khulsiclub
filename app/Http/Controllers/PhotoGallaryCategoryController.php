<?php

namespace App\Http\Controllers;

use App\Models\photoGallaryCategory;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class PhotoGallaryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pGalleryCat=photoGallaryCategory::paginate(10);
        return view('pGalleryCat.index',compact('pGalleryCat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pGalleryCat.create');
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
            $pgc=new photoGallaryCategory;

            $pgc->name=$request->name;
            $pgc->status=$request->status;
            if($request->hasFile('feature_image')){
                $feature_image = rand(11,99).time().'.'.$request->feature_image->extension();
                $request->feature_image->move(public_path('uploads/pGcategory'), $feature_image);
                $pgc->feature_image=$feature_image;
            }
            if($pgc->save()){
            Toastr::success('Photo Category Create Successfully!');
            return redirect()->route(currentUser().'.pGalleryCat.index');
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
     * @param  \App\Models\photoGallaryCategory  $photoGallaryCategory
     * @return \Illuminate\Http\Response
     */
    public function show(photoGallaryCategory $photoGallaryCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\photoGallaryCategory  $photoGallaryCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pGalleryCat=photoGallaryCategory::findOrFail(encryptor('decrypt',$id));
        return view('pGalleryCat.edit',compact('pGalleryCat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\photoGallaryCategory  $photoGallaryCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $pgc=photoGallaryCategory::findOrFail(encryptor('decrypt',$id));
            $pgc->name=$request->name;
            $pgc->status=$request->status;
            if($request->hasFile('feature_image')){
                $feature_image = rand(11,99).time().'.'.$request->feature_image->extension();
                $request->feature_image->move(public_path('uploads/pGcategory'), $feature_image);
                $pgc->feature_image=$feature_image;
            }
            if($pgc->save()){
            Toastr::success('Photo Category Updated Successfully!');
            return redirect()->route(currentUser().'.pGalleryCat.index');
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
     * @param  \App\Models\photoGallaryCategory  $photoGallaryCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(photoGallaryCategory $photoGallaryCategory)
    {
        //
    }
}
