<?php

namespace App\Http\Controllers;

use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caption=VideoGallery::get();
        return view('video_gallery.index',compact('caption'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('video_gallery.create');
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
            $vgallery=new VideoGallery;
            $vgallery->caption=$request->caption;
            $vgallery->video_id=$request->videoId;
            $vgallery->publish_date=$request->publishedDate;
            $vgallery->unpublished_date=$request->unpublishedDate;
            if($request->hasFile('FeatureImage')){
                $FeatureImageName = rand(111,999).time().'.'.$request->FeatureImage->extension();
                $request->FeatureImage->move(public_path('uploads/vgallery_image'), $FeatureImageName);
                $vgallery->feature_image=$FeatureImageName;
            }
            $vgallery->status=$request->status;
            if($vgallery->save()){
            Toastr::success('Video Gallery Create Successfully!');
            return redirect()->route(currentUser().'.vgallery.index');
            }else{
            return redirect()->back();
            Toastr::success('Please try Again!');
            }

        }
        catch (Exception $e){
            dd($e);
            return back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function show(VideoGallery $videoGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $videogallery=VideoGallery::findOrFail(encryptor('decrypt',$id));
        return view('video_gallery.edit',compact('videogallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $vgallery=VideoGallery::findOrFail(encryptor('decrypt',$id));
            $vgallery->caption=$request->caption;
            $vgallery->video_id=$request->videoId;
            $vgallery->publish_date=$request->publishedDate;
            $vgallery->unpublished_date=$request->unpublishedDate;
            if($request->hasFile('FeatureImage')){
                $FeatureImageName = rand(111,999).time().'.'.$request->FeatureImage->extension();
                $request->FeatureImage->move(public_path('uploads/vgallery_image'), $FeatureImageName);
                $vgallery->feature_image=$FeatureImageName;
            }
            $vgallery->status=$request->status;
            if($vgallery->save()){
            Toastr::success('Video Gallery Updateed Successfully!');
            return redirect()->route(currentUser().'.vgallery.index');
            }else{
            return redirect()->back();
            Toastr::success('Please try Again!');
            }

        }
        catch (Exception $e){
            dd($e);
            return back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vgallery=VideoGallery::findOrFail(encryptor('decrypt',$id));
        $vgallery->delete();
        Toastr::warning('Slider Deleted Permanently!');
        return redirect()->back();
    }
}
