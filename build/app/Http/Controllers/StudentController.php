<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Religion;
use App\Bank;
use App\Grade;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::all();
        return view('administrator.m-student.allStudent',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $religions = Religion::all();
        $banks = Bank::all();
        $classes = Grade::all();
        return view('administrator.m-student.addStudent',['religions'=>$religions,'banks'=>$banks,'classes'=>$classes]);
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
        $student = new Student;
        $student->nik = $request->studentNik;
        $student->nisn = $request->studentNisn;
        $student->nis = $request->studentNis;
        $student->password = $request->studentPassword;
        $student->fname = $request->studentFname;
        $student->lname = $request->studentLname;
        $student->b_place = $request->studentBPlace;
        $student->b_date = $request->studentBDate;
        $student->address = $request->studentAddress;
        $student->district = $request->studentDistrict;
        $student->sub_district = $request->studentSubDistrict;
        $student->rt = $request->studentRT;
        $student->rw = $request->studentRW;
        $student->city = $request->studentCity;
        $student->province = $request->studentProvince;
        $student->phone = $request->studentPhone;
        $student->email = $request->studentEmail;
        $student->bank_acc = $request->studentBAcc;
        $student->blood_type = $request->studentBlood;
        $student->gr_from = $request->studentOSchool;
        $student->notes = $request->studentNotes;
        $student->photo = "";
        $student->religion_id = $request->studentReligion;
        $student->class_id = $request->studentClass;
        $student->bank_id = $request->studentBank;
        $student->save();
        if(is_null($request->studentPhoto))
        {

        }
        else {
          // code...
          $file = $request->studentPhoto;
          $file->move('system-data',"s_img-".$request->studentNik);
        }
        return redirect('/student')->with('status','Master Student Saved Successfully !');
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
        $student = Student::find($id);
        return view('administrator.m-student.detailStudent',['student'=>$student]);
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
        $religions = Religion::all();
        $banks = Bank::all();
        $student = Student::find($id);
        return view('administrator.m-student.editStudent',['student'=>$student,'religions'=>$religions,'banks'=>$banks]);
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
        $student = Student::find($id);
        $student->nik = $request->studentNik;
        $student->nisn = $request->studentNisn;
        $student->nis = $request->studentNis;
        $student->password = $request->studentPassword;
        $student->fname = $request->studentFname;
        $student->lname = $request->studentLname;
        $student->b_place = $request->studentBPlace;
        $student->b_date = $request->studentBDate;
        $student->address = $request->studentAddress;
        $student->district = $request->studentDistrict;
        $student->sub_disctrict = $request->studentSubDistrict;
        $student->rt = $request->studentRT;
        $student->rw = $request->studentRW;
        $student->city = $request->studentCity;
        $student->province = $request->studentProvince;
        $student->phone = $request->studentPhone;
        $student->email = $request->studentEmail;
        $student->bank_acc = $request->studentBAcc;
        $student->blood_type = $request->studentBlood;
        $student->gr_from = $request->studentOSchool;
        $student->notes = $request->studentNotes;
        $student->photo = "";
        $student->religion_id = $request->studentReligion;
        $student->class_id = $request->studentClass;
        $student->bank = $request->studentBank;
        $student->save();
        return redirect('/student')->with('status','Success Edit Master Student');
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
        $student = Student::find($id);
        if($student->status == 'inactive')
        {
          $student->status = 'inactive';
        }
        else {
          $student->status = 'active';
        }
        $student->save();
        return redirect('/student');
    }
}
