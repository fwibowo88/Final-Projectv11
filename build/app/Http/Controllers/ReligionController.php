<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Religion;

class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $religions = Religion::all();
        return view('administrator.m-religion.allReligion',['religions'=>$religions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('administrator.m-religion.addReligion');
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
        $religion = new Religion;
        $religion->name = $request->religionName;
        $religion->description = $request->religionDescription;
        $religion->save();
        return redirect('/religion')->with('status', 'Master Religion Saved Successfully !');
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
        $religion = Religion::find($id);
        return view('administrator.m-religion.editReligion',['religion'=>$religion]);
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
        $religion = Religion::find($id);
        $religion->name = $request->religionName;
        $religion->description = $request->religionDescription;
        $religion->save();
        return redirect('/religion')->with('status', 'Success Edit Master Religion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $religion = Religion::find($id);
        if($religion->status == 'active')
        {
          $religion->status = 'inactive';
        }
        else
        {
          $religion->status = 'active';
        }
        $religion->save();
        return redirect('/religion');
    }
}
