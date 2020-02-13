<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Class;
use App\Employee;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $classes = Class::all();
        // return view('administrator.m-class.allClass',['classes'=>$classes]);
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
        // $class = new Class;
        // $class->name = $request->className;
        // $class->description =  $request->classDescription;
        // $class->program_id = $request->classProgram;
        // $class->employee_id = $request->classTeacher;
        // $class->save();
        // return redirect('/class')->with('status','Master Class Saved Successfully');
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
        // $class = Class::find($id);
        // return view('administrator.m-class.editClass',['class'=>$class]);
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
        // $class = Class::find($id);
        // $class->name = $request->className;
        // $class->description =  $request->classDescription;
        // $class->program_id = $request->classProgram;
        // $class->employee_id = $request->classTeacher;
        // $class->save();
        // return redirect('/class')->with('status','Success Edit Master Class');
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
        // $class = Class::find($id);
        // if($class->status == 'active')
        // {
        //   $class->status = 'active';
        // }
        // else {
        //   $class->status = 'inactive';
        // }
        // $class->save();
        // return redirect('/class');
    }
}
