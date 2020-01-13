<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $programs = Program::all();
        return view('administrator.m-program.allProgram',['programs'=>$programs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('administrator.m-program.addProgram');
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
        $program = new Program;
        $program->name = $request->programName;
        $program->description = $request->programDescription;
        $program->save();
        return redirect('/program')->with('status', 'Master Program Saved Successfully !');

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
        $program = Program::find($id);
        return view('administrator.m-program.editProgram',['program'=>$program]);
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
        $program = Program::find($id);
        $program->name = $request->programName;
        $program->description = $request->programDescription;
        $program->save();
        return redirect('/program')->with('status', 'Success Edit Master Program !');
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
        $program = Program::find($id);
        if($program->status == 'active')
        {
          $program->status = 'inactive';
        }
        else {
          $program->status = 'active';
        }
        $program->save();
        return redirect('/program');
    }
}
