<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Employee;
use App\MedicalRecord;

class MedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medicals = MedicalRecord::all();
        return view('administrator.t-medical.allMedical',['medicals'=>$medicals]);
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
        $staffs = Employee::all();
        return view('administrator.t-medical.addMedical',['students'=>$students,'staffs'=>$staffs]);
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
        $medical = new MedicalRecord;
        $medical->symptom = $request->medicalSymptom;
        $medical->diagnosis = $request->medicalDiagnosis;
        $medical->notes = $request->medicalNotes;
        $medical->recommendation = $request->medicalRecommendation;
        $medical->student_id = $request->medicalStudent;
        $medical->employee_id = 1; //Binding to Employee Auth
        $medical->save();
        return redirect('/medical-record')->with('status','Medical Record Saved Successfully');
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
        $medical = MedicalRecord::find($id);
        $students = Student::all();
        return view('administrator.t-medical.editMedical',['medical'=>$medical,'students'=>$students]);
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
        $medical = MedicalRecord::find($id);
        $medical->symptom = $request->medicalSymptom;
        $medical->diagnosis = $request->medicalDiagnosis;
        $medical->notes = $request->medicalNotes;
        $medical->recommendation = $request->medicalRecommendation;
        $medical->student_id = $request->medicalStudent;
        $medical->employee_id = 1;//Binding to Employee Auth
        $medical->save();
        return redirect('/medical-record')->with('status','Success Edit Medical Record');
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
        $medical = MedicalRecord::find($id);
        $medical->delete();
        return redirect('/medical-record');
    }
}
