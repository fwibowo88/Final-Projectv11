<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Employee;
use App\Program;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classes = Grade::all();
        return view('administrator.m-class.allClass',['classes'=>$classes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $programs = Program::all();
        $teachers = Employee::all();
        return view('administrator.m-class.addClass',['programs'=>$programs,'teachers'=>$teachers]);
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
        $class = new Grade;
        $class->name = $request->className;
        $class->description =  $request->classDescription;
        $class->program_id = $request->classProgram;
        $class->employee_id = $request->classTeacher;
        $class->save();
        return redirect('/class')->with('status','Master Class Saved Successfully');
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
        $class = Grade::find($id);
        $programs = Program::all();
        $teachers = Employee::all();
        return view('administrator.m-class.editClass',['class'=>$class,'teachers'=>$teachers,'programs'=>$programs]);
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
        $class = Grade::find($id);
        $class->name = $request->className;
        $class->description =  $request->classDescription;
        $class->program_id = $request->classProgram;
        $class->employee_id = $request->classTeacher;
        $class->save();
        return redirect('/class')->with('status','Success Edit Master Class');
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
        $class = Grade::find($id);
        if($class->status == 'active')
        {
          $class->status = 'inactive';
        }
        else {
          $class->status = 'active';
        }
        $class->save();
        return redirect('/class');
    }
}
