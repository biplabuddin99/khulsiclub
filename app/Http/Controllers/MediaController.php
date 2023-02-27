<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\year;
use App\Models\photoGallary;
use App\Models\photoGallaryCategory;

class MediaController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function pGallery()
    {
        $photoYear=year::all();
        return view('frontend.media.year',compact('photoYear'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function album($slug)
    {
        $py=year::where('id', $slug)->first();
        $pAlbum = photoGallaryCategory::whereIn('year_id', [$py->id])->where('status', '1')->orderby('id', 'asc')->paginate('12');
        return view('frontend.media.album',compact('pAlbum'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend  $frontend
     * @return \Illuminate\Http\Response
     */
    public function photo($slug)
    {
        $cat= photoGallaryCategory::where('id', $slug)->first();
        $photo = photoGallary::whereIn('photo_gallary_category_id', [$cat->id])->where('status', '1')->orderby('id', 'asc')->paginate('12');
        return view('frontend.media.photo',compact('photo'));
    }
}
