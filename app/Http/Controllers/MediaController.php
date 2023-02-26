<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\year;
use App\Models\photoGallary;

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
        return view('frontend.media.photo',compact('photoYear'));
    }
}
