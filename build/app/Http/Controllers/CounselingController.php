<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counseling;

class CounselingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $counselings = Counseling::all();
        return view('administrator.m-counseling.allCounseling',['counselings'=>$counselings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('administrator.m-counseling.addCounseling');
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
        $counseling = new Counseling;
        $counseling->name = $request->counselingName;
        $counseling->description = $request->counselingDescription;
        $counseling->save();

        return redirect('/counseling')->with('status','Master Counseling Saved Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $counseling = Counseling::find($id);
        return view('administrator.m-counseling.editCounseling',['counseling'=>$counseling]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $counseling = Counseling::find($id);
        $counseling->name = $request->counselingName;
        $counseling->description = $request->counselingDescription;
        $counseling->save();
        return redirect('/counseling')->with('status','Success Edit Master Counseling !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $counseling = Counseling::find($id);
        if($counseling->status == 'active')
        {
          $counseling->status = 'inactive';
        }
        else {
          $counseling->status = 'active';
        }
        $counseling->save();
        return redirect('/counseling');
    }
}
