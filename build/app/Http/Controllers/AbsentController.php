<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Employee;
use App\AbsentRecord;

class AbsentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $absents = AbsentRecord::all();
        return view('administrator.t-absent.allAbsent',['absents'=>$absents]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $students = Student::all();
        $employees = Employee::all();
        return view('administrator.t-absent.addAbsent',['students'=>$students,'employees'=>$employees]);
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
        $absent = new AbsentRecord;
        $absent->start_date = $request->absentStDate;
        $absent->end_date = $request->absentEdDate;
        $absent->type = $request->absentType;
        $absent->description = $request->absentDescription;
        $absent->status = $request->absentStatus;
        $absent->student_id = $request->absentStudent;
        $absent->employee_id = 1;
        $absent->save();
        return redirect('absent-Record')->with('status','Absent Record Saved Successfully');
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
        $absent = AbsentRecord::find($id);
        return view('administrator.t-absent.editAbsent');
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
        $absent = AbsentRecord::find($id);
        $absent->start_date = $request->absentStDate;
        $absent->end_date = $request->absentEdDate;
        $absent->type = $request->absentType;
        $absent->description = $request->absentDescription;
        $absent->status = $request->absentStatus;
        $absent->student_id = $request->absentStudent;
        $absent->employee_id = 1;
        $absent->save();
        return redirect('/absent-record')->with('status','Success Edit Absent Record');
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
        $absent = AbsentRecord::find($id);
        $absent->delete();
        return redirect('absent-record');
    }
}
