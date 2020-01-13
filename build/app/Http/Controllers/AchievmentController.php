<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Achievment;

class AchievmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $achievments = Achievment::all();
        return view('administrator.m-achievment.allAchievment',['achievments'=>$achievments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('administrator.m-achievment.addAchievment');
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
        // var_dump($request->achievmentPoint);
        $achievment = new Achievment;
        $achievment->name = $request->achievmentName;
        $achievment->description = $request->achievmentDescription;
        $achievment->point = $request->achievmentPoint;
        $achievment->grade = $request->achievmentGrade;
        $achievment->save();
        return redirect('/achievment')->with('status','Master Achievment Saved Successfully !');
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
        $achievment = Achievment::find($id);
        return view('administrator.m-achievment.editAchievment',['achievment'=>$achievment]);
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
        $achievment = Achievment::find($id);
        $achievment->name = $request->achievmentName;
        $achievment->description = $request->achievmentDescription;
        $achievment->point = $request->achievmentPoint;
        $achievment->grade = $request->achievmentGrade;
        $achievment->save();
        return redirect('/achievment')->with('status','Success Edit Master Achievment');
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
        $achievment = Achievment::find($id);
        if($achievment->status == 'active')
        {
          $achievment->status = 'inactive';
        }
        else {
          $achievment->status = 'active';
        }
        $achievment->save();
        return redirect('/achievment');
    }
}
