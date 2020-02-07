<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guardian;
use App\Religion;
use App\Student;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $guardians = Guardian::all();
        return view('administrator.m-guardian.allGuardian',['guardians'=>$guardians]);
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
        $religions = Religion::all();
        return view('administrator.m-guardian.addGuardian');
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
        $guardian = new Guardian;
        $guardian->fname = $request->guardianFname;
        $guardian->lname = $request->guardianLname;
        $guardian->b_place = $request->guardianBPlace;
        $guardian->b_date = $request->guardianBDate;
        $guardian->address = $request->guardianAddress;
        $guardian->relation = $request->guardianRelation;
        $guardian->email = $request->guardianEmail;
        $guardian->phone = $request->guardianPhone;
        $guardian->password = $request->guardianPassword;
        $guardian->education = $request->guardianEducation;
        $guardian->job = $request->guardianJob;
        $guardian->notes = $request->guardianNotes;
        $guardian->religion_id = $request->guardianReligion;
        $guardian->student_id = $request->guardianStudent;
        $guardian->save();
        return redirect('/guardian')->with('status','Master Guardian Saved Successfully');
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
        $guardian = Guardian::find($id);
        $students = Student::all();
        $religions = Religion::all();
        return view('administrator.m-guardian.editGuardian',['guardian'=>$guardian,'religions'=>$religions,'students'=>$students]);
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
        $guardian = Guardian::find($id);
        $guardian->fname = $request->guardianFname;
        $guardian->lname = $request->guardianLname;
        $guardian->b_place = $request->guardianBPlace;
        $guardian->b_date = $request->guardianBDate;
        $guardian->address = $request->guardianAddress;
        $guardian->relation = $request->guardianRelation;
        $guardian->email = $request->guardianEmail;
        $guardian->phone = $request->guardianPhone;
        $guardian->password = $request->guardianPassword;
        $guardian->education = $request->guardianEducation;
        $guardian->job = $request->guardianJob;
        $guardian->notes = $request->guardianNotes;
        $guardian->religion_id = $request->guardianReligion;
        $guardian->student_id = $request->guardianStudent;
        $guardian->save();
        return redirect('/guardian')->with('status','Success Edit Master Guardian');
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
        $guardian = Guardian::find($id);
        $guardian->delete();
        return redirect('/guardian');
    }
}
