<?php

namespace App\Http\Controllers;

use App\Models\founding_committee;
use App\Models\OurMember;
use Illuminate\Http\Request;

class FoundingCommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourmember=OurMember::paginate(10);
        return view('foundCommittee.index',compact('ourmember'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ourmember = OurMember::all();
        return view('foundCommittee.create',compact('ourmember'));
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
     * @param  \App\Models\founding_committee  $founding_committee
     * @return \Illuminate\Http\Response
     */
    public function show(founding_committee $founding_committee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\founding_committee  $founding_committee
     * @return \Illuminate\Http\Response
     */
    public function edit(founding_committee $founding_committee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\founding_committee  $founding_committee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, founding_committee $founding_committee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\founding_committee  $founding_committee
     * @return \Illuminate\Http\Response
     */
    public function destroy(founding_committee $founding_committee)
    {
        //
    }
}
