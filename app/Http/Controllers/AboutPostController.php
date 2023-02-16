<?php

namespace App\Http\Controllers;

use App\Models\about_post;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class AboutPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = about_post::paginate(10);
        return view('Post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Post.create');
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
            $post= new about_post();

            $post->page_title=$request->title;
            $post->details=$request->details;
            $post->published=$request->published;
            

            if($post->save()){
            Toastr::success('Post created Successfully!');
            return redirect()->route(currentUser().'.post.index');
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
     * @param  \App\Models\about_post  $about_post
     * @return \Illuminate\Http\Response
     */
    public function show(about_post $about_post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\about_post  $about_post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = about_post::findOrFail(encryptor('decrypt',$id));
        return view('Post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\about_post  $about_post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $post= about_post::findOrFail(encryptor('decrypt',$id));

            $post->page_title=$request->title;
            $post->details=$request->details;
            $post->published=$request->published;
            

            if($post->save()){
            Toastr::success('Post Updated Successfully!');
            return redirect()->route(currentUser().'.post.index');
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
     * @param  \App\Models\about_post  $about_post
     * @return \Illuminate\Http\Response
     */
    public function destroy(about_post $about_post)
    {
        //
    }
}
