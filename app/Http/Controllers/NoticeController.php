<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Exception;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notice.create');
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
            $notice=new Notice;
            $notice->title=$request->title;
            $notice->details=$request->Details;
            $notice->published_date=$request->publishedDate;
            $notice->unpublished_date=$request->unpublishedDate;
            if($request->hasFile('Picture')){
                $PictureName = rand(111,999).time().'.'.$request->Picture->extension();
                $request->Picture->move(public_path('uploads/Slide_image'), $PictureName);
                $notice->image=$PictureName;
            }
            if($request->hasFile('noticefile')){
                $noticefileName = rand(111,999).time().'.'.$request->noticefile->extension();
                $request->noticefile->move(public_path('uploads/Slide_image'), $noticefileName);
                $notice->noticefile=$noticefileName;
            }
            if($notice->save())
            return redirect()->route(currentUser().'.notice.index');
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
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        //
    }
}
