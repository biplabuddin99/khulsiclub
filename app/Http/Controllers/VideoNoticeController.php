<?php

namespace App\Http\Controllers;

use App\Models\video_notice;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class VideoNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videoNotice = video_notice::paginate(10);
        return view('VideoNotice.index',compact('videoNotice'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('VideoNotice.create');
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
            $videoNotice = new video_notice;
            $videoNotice->title = $request->title;
            $videoNotice->link = $request->link;
            if($videoNotice->save()){
                Toastr::success('Create Successfully!');
                return redirect()->route(currentUser().'.vNotice.index');
                }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
                }

        }catch (Exception $e){
            Toastr::warning('Please try Again!');
            dd($e);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\video_notice  $video_notice
     * @return \Illuminate\Http\Response
     */
    public function show(video_notice $video_notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\video_notice  $video_notice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $videoNotice = video_notice::findOrFail(encryptor('decrypt',$id));
        return view('VideoNotice.edit',compact('videoNotice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\video_notice  $video_notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $videoNotice = video_notice::findOrFail(encryptor('decrypt',$id));
            $videoNotice->title = $request->title;
            $videoNotice->link = $request->link;
            if($videoNotice->save()){
                Toastr::success('Updated Successfully!');
                return redirect()->route(currentUser().'.vNotice.index');
                }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
                }

        }catch (Exception $e){
            Toastr::warning('Please try Again!');
            dd($e);
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\video_notice  $video_notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(video_notice $video_notice)
    {
        //
    }
}
