<?php

namespace App\Http\Controllers;

use App\Models\FrontMenu;
use App\Models\Page;
use Illuminate\Http\Request;

class FrontMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus=FrontMenu::all();
        $pages=Page::all();
        return view('frontmenu.index',compact('menus','pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FrontMenu  $frontMenu
     * @return \Illuminate\Http\Response
     */
    public function show(FrontMenu $frontMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontMenu  $frontMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontMenu $frontMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontMenu  $frontMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontMenu $frontMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontMenu  $frontMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontMenu $frontMenu)
    {
        //
    }
}
