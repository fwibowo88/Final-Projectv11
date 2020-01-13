<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
Use Redirect;
use App\AcademicYear;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $years = AcademicYear::all();
        return view('administrator.m-AcademicYear.allYear',['years'=>$years]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('administrator.m-AcademicYear.addYear');
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
        if($request->yearEdDate < $request->yearStDate || $request->yearEdDate == $request->yearStDate )
        {
          return Redirect::back()
          ->withInput(Input::all())->with('status','Invalid Start & End Date');
        }
        else {
          $year = new AcademicYear;
          $year->name = $request->yearName;
          $year->description = $request->yearDescription;
          $year->type = $request->yearType;
          $year->start_date = $request->yearStDate;
          $year->end_date = $request->yearEdDate;
          $year->save();
          return redirect('/academic-Year')->with('status','Master Academic Year Saved Successfully !');
        }

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
        $year = AcademicYear::find($id);
        return view('administrator.m-AcademicYear.editYear',['year'=>$year]);
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
        if($request->yearEdDate < $request->yearStDate || $request->yearEdDate == $request->yearStDate )
        {
          return Redirect::back()
          ->withInput(Input::all())->with('status','Invalid Start & End Date');
        }
        else {
          $year = AcademicYear::find($id);
          $year->name = $request->yearName;
          $year->description = $request->yearDescription;
          $year->type = $request->yearType;
          $year->start_date = $request->yearStDate;
          $year->end_date = $request->yearEdDate;
          $year->save();
          return redirect('/academic-Year')->with('status','Success Edit Master Academic Year');
        }
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
        $year = AcademicYear::find($id);
        if($year->status == 'active')
        {
          $year->status = 'inactive';
        }
        else {
          $year->status = 'active';
        }
        $year->save();
        return redirect('/academic-Year');
    }
}
