<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Extracurricular;

class ExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $extracurriculars = Extracurricular::all();
        return view('administrator.m-extracurricular.allExtracurricular',['extracurriculars'=>$extracurriculars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $coaches = Employee::all();
        return view('administrator.m-extracurricular.addExtracurricular',['coaches'=>$coaches]);
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
        $extracurricular = new Extracurricular;
        $extracurricular->name = $request->extracurricularName;
        $extracurricular->description = $request->extracurricularDescription;
        $extracurricular->employee_id = $request->extracurricularCoach;
        $extracurricular->save();
        return redirect('/extracurricular')->with('status','Master Extracurricular Saved Successfully');
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
        $coaches = Employee::all();
        $extracurricular = Extracurricular::find($id);
        return view('administrator.m-extracurricular.editExtracurricular',['extracurricular'=>$extracurricular,'coaches'=>$coaches]);

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
        $extracurricular = Extracurricular::find($id);
        $extracurricular->name = $request->extracurricularName;
        $extracurricular->description = $request->extracurricularDescription;
        $extracurricular->employee_id = $request->extracurricularCoach;
        $extracurricular->save();
        return redirect('/extracurricular')->with('status','Success Edit Master Extracurricular');
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
        $extracurricular = Extracurricular::find($id);
        if($extracurricular->status == 'active')
        {
          $extracurricular->status = 'inactive';
        }
        else {
          $extracurricular->status = 'active';
        }
        $extracurricular->save();
        return redirect('/extracurricular');
    }
}
