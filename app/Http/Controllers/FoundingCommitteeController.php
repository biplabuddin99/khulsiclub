<?php

namespace App\Http\Controllers;

use App\Models\founding_committee;
use App\Models\OurMember;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use DB;
class FoundingCommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $ourmember= DB::select("SELECT * FROM `our_members` INNER JOIN founding_committees ON our_members.member_id=founding_committees.member_id");
        $ourmember = DB::table('our_members')
                ->join('founding_committees', 'our_members.member_id', '=', 'founding_committees.member_id')
                ->select('our_members.*')
                ->paginate(10);

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if($request->name){
            $members=OurMember::select('id','given_name as value1','surname as value2','member_id as label','cell_number')->where(function($query) use ($request) {
                        $query->where('given_name','like', '%' . $request->name . '%')->orWhere('member_id','like', '%' . $request->name . '%');
                        })->get();
                      print_r(json_encode($members));  
        }
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function member_search_data(Request $request)
    {
        if($request->item_id){
            $members=OurMember::where('id',$request->item_id)->first();
            $data='<tr class="text-center">';
            $data.='<td class="p-2">'.$members->full_name.'<input name="member_id[]" type="hidden" value="'.$members->id.'"></td>';
            $data.='<td class="p-2">'.$members->member_id.'<input name="memberId[]" type="hidden" value="'.$members->member_id.'"></td>';
            $data.='<td class="p-2">'.$members->cell_number.'<input name="phone[]" type="hidden"></td>';
            $data.='<td class="p-2 text-danger"><i style="font-size:1.7rem" onclick="removerow(this)" class="bi bi-dash-circle-fill"></i></td>';
            $data.='</tr>';
            
            print_r(json_encode($data));  
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
            if($request->member_id){
                foreach($request->member_id as $i=>$member_id){
                    $fc=new founding_committee;
                    $fc->member_id=$request->memberId[$i];

                }
            }

            if($fc->save()){
            Toastr::success('Added Successfully!');
            return redirect()->route(currentUser().'.foundCommittee.index');
            }else{
            Toastr::warning('Please try Again!');
            return redirect()->back();
            }

        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
             dd($e);
            return back()->withInput();

        }
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
    public function destroy($id)
    {
        $cat= founding_committee::findOrFail(encryptor('decrypt',$id));
        $cat->delete();
        Toastr::warning('Deleted Permanently!');
        return redirect()->back();
    }
}
