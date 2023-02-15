<?php

namespace App\Http\Controllers;

use App\Models\menu_setting;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class MenuSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = menu_setting::paginate(10);
        return view('Menu.index',compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
    
            $request->file('upload')->move(public_path('media'), $fileName);
    
            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
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
            $menu=new menu_setting;

            $menu->page_title=$request->title;
            $menu->details=$request->details;
            $menu->published=$request->published;
            

            if($menu->save()){
            Toastr::success('Menu Create Successfully!');
            return redirect()->route(currentUser().'.menu.index');
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
     * @param  \App\Models\menu_setting  $menu_setting
     * @return \Illuminate\Http\Response
     */
    public function show(menu_setting $menu_setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\menu_setting  $menu_setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = menu_setting::findOrFail(encryptor('decrypt',$id));
        return view('Menu.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\menu_setting  $menu_setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $menu= menu_setting::findOrFail(encryptor('decrypt',$id));

            $menu->page_title=$request->title;
            $menu->details=$request->details;
            $menu->published=$request->published;
            

            if($menu->save()){
            Toastr::success('Menu Updated Successfully!');
            return redirect()->route(currentUser().'.menu.index');
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
     * @param  \App\Models\menu_setting  $menu_setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(menu_setting $menu_setting)
    {
        //
    }
}
