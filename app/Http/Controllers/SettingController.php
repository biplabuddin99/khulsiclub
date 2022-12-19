<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings=setting::paginate(10);
        return view('setting.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setting.create');
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
            $data=new setting;
            $data->address=$request->address;
            $data->contact_no=$request->contact_no;
            $data->email_address=$request->email_address;
            $data->facebook_link=$request->facebook_link;
            $data->twitter_link=$request->twitter_link;
            $data->youtube_link=$request->youtube_link;
            $data->linkdin_link=$request->linkdin_link;
            $data->footer_top_p1_text=$request->footer_top_p1_text;
            $data->footer_top_p2_text=$request->footer_top_p2_text;
            $data->footer_top_p3_text=$request->footer_top_p3_text;
            if($request->hasFile('header_logo')){
                $header_logo = rand(11,99).time().'.'.$request->header_logo->extension();
                $request->header_logo->move(public_path('uploads/settings'), $header_logo);
                $data->header_logo=$header_logo;
            }
            if($request->hasFile('footer_logo')){
                $footer_logo = rand(11,99).time().'.'.$request->footer_logo->extension();
                $request->footer_logo->move(public_path('uploads/settings'), $footer_logo);
                $data->footer_logo=$footer_logo;
            }
            if($request->hasFile('we_accept')){
                $we_accept = rand(11,99).time().'.'.$request->we_accept->extension();
                $request->we_accept->move(public_path('uploads/settings'), $we_accept);
                $data->we_accept=$we_accept;
            }
            if($request->hasFile('footer_top_p1_image')){
                $footer_top_p1_image = rand(11,99).time().'.'.$request->footer_top_p1_image->extension();
                $request->footer_top_p1_image->move(public_path('uploads/settings'), $footer_top_p1_image);
                $data->footer_top_p1_image=$footer_top_p1_image;
            }
            if($request->hasFile('footer_top_p2_image')){
                $footer_top_p2_image = rand(11,99).time().'.'.$request->footer_top_p2_image->extension();
                $request->footer_top_p2_image->move(public_path('uploads/settings'), $footer_top_p2_image);
                $data->footer_top_p2_image=$footer_top_p2_image;
            }
            if($request->hasFile('footer_top_p3_image')){
                $footer_top_p3_image = rand(11,99).time().'.'.$request->footer_top_p3_image->extension();
                $request->footer_top_p3_image->move(public_path('uploads/settings'), $footer_top_p3_image);
                $data->footer_top_p3_image=$footer_top_p3_image;
            }
            if($data->save()){
            Toastr::success('Settings Create Successfully!');
            return redirect()->route(currentUser().'.settings.index');
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
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings=setting::findOrFail(encryptor('decrypt',$id));
        return view('setting.edit',compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $data=setting::findOrFail(encryptor('decrypt',$id));
            $data->address=$request->address;
            $data->contact_no=$request->contact_no;
            $data->email_address=$request->email_address;
            $data->facebook_link=$request->facebook_link;
            $data->twitter_link=$request->twitter_link;
            $data->youtube_link=$request->youtube_link;
            $data->linkdin_link=$request->linkdin_link;
            $data->footer_top_p1_text=$request->footer_top_p1_text;
            $data->footer_top_p2_text=$request->footer_top_p2_text;
            $data->footer_top_p3_text=$request->footer_top_p3_text;
            if($request->hasFile('header_logo')){
                $header_logo = rand(11,99).time().'.'.$request->header_logo->extension();
                $request->header_logo->move(public_path('uploads/settings'), $header_logo);
                $data->header_logo=$header_logo;
            }
            if($request->hasFile('footer_logo')){
                $footer_logo = rand(11,99).time().'.'.$request->footer_logo->extension();
                $request->footer_logo->move(public_path('uploads/settings'), $footer_logo);
                $data->footer_logo=$footer_logo;
            }
            if($request->hasFile('we_accept')){
                $we_accept = rand(11,99).time().'.'.$request->we_accept->extension();
                $request->we_accept->move(public_path('uploads/settings'), $we_accept);
                $data->we_accept=$we_accept;
            }
            if($request->hasFile('footer_top_p1_image')){
                $footer_top_p1_image = rand(11,99).time().'.'.$request->footer_top_p1_image->extension();
                $request->footer_top_p1_image->move(public_path('uploads/settings'), $footer_top_p1_image);
                $data->footer_top_p1_image=$footer_top_p1_image;
            }
            if($request->hasFile('footer_top_p2_image')){
                $footer_top_p2_image = rand(11,99).time().'.'.$request->footer_top_p2_image->extension();
                $request->footer_top_p2_image->move(public_path('uploads/settings'), $footer_top_p2_image);
                $data->footer_top_p2_image=$footer_top_p2_image;
            }
            if($request->hasFile('footer_top_p3_image')){
                $footer_top_p3_image = rand(11,99).time().'.'.$request->footer_top_p3_image->extension();
                $request->footer_top_p3_image->move(public_path('uploads/settings'), $footer_top_p3_image);
                $data->footer_top_p3_image=$footer_top_p3_image;
            }
            if($data->save()){
            Toastr::success('Settings Updated Successfully!');
            return redirect()->route(currentUser().'.settings.index');
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
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(setting $setting)
    {
        //
    }
}
