<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Religion;
use App\Bank;
use App\Grade;
use App\Student;
use App\Guardian;
use App\Program;
use App\File;

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
        // // dd($students);
        foreach($students as $student)
        {
          return $student->class_id;
          // return $tmClass = Grade::find($student->class_id)->name;
          // foreach($student->grade as $stGrade)
          // {
          //   return 'ok';
          // }
        }
        //return view('administrator.m-student.allStudent',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Get All Active Master Data
        $religions = Religion::where('status','active')->get();
        $banks = Bank::where('status','active')->get();
        $classes = Grade::where('status','active')->get();
        $program = Program::where('status','active')->get();
        return view('administrator.m-student.addStudent',['religions'=>$religions,'banks'=>$banks,'classes'=>$classes,'programs'=>$program]);
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
        $student->password = bcrypt($request->studentPassword);
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
        $student->height = $request->studentHeight;
        $student->weight = $request->studentWeight;
        $student->gr_from = $request->studentOSchool;
        $student->science_score = $request->studentSCI;
        $student->mathematic_score = $request->studentMTH;
        $student->indonesian_score = $request->studentIDN;
        $student->english_score = $request->studentENG;
        $student->total_score = $request->studentTotalScore;
        $student->notes = $request->studentNotes;
        $student->religion_id = $request->studentReligion;
        $student->class_id = $request->studentClass;
        $student->bank_id = $request->studentBank;
        $student->save();
        //
        // Sync Student to Program
        $student->programs()->sync([$request->studentProgram[0],['is_primary'=>true]]);
        //
        // Student Photo File Handling
        if(isset($request->studentPhoto))
        {
          // Check File Type
          $tmStudentPhoto = $request->studentPhoto;
          if($tmStudentPhoto->getClientOriginalExtension() == 'png' || $tmStudentPhoto->getClientOriginalExtension() == 'jpg' || $tmStudentPhoto->getClientOriginalExtension() == 'pdf')
          {
            $tmStudentPhoto->move('system-data/students/'.$student->id.'/',"profile-".$request->studentNik);
          }
          else {
            $message = "Upload Profile Picture Failed";
          }
        }
        //Save All Document to Database & Server
        if(isset($request->studentDocument))
        {
          $tmDocumentDescription = $request->stDocumentDescription;
          $tmStudentDocuments = $request->studentDocument;
          foreach($tmStudentDocuments as $tmStudentDoc)
          {
            if($tmStudentDoc->getClientOriginalExtension() == 'png' || $tmStudentDoc->getClientOriginalExtension() == 'jpg' || $tmStudentDoc->getClientOriginalExtension() == 'pdf')
            {
              $tmStudentDoc->move('system-data/students/'.$student->id.'/', $tmStudentDoc->getClientOriginalName());
              $file = new File;
              $file->file_name = $tmStudentDoc->getClientOriginalName();
              $file->description = $tmStudentDoc->getClientOriginalName();
              $file->student_id = $student->id;
              $file->save();
            }
            else {
              $message = "Something Error with Documents";
            }
          }
        }

        $sibling = new Guardian();
        $sibling->fname = $request->siblingFName;
        $sibling->lname = $request->siblingLName;
        $sibling->b_place = $request->siblingBPlace;
        $sibling->b_date = $request->siblingBDate;
        $sibling->address = $request->siblingAddress;
        $sibling->relation = $request->siblingRelation;
        $sibling->email = $request->siblingEmail;
        $sibling->phone = $request->siblingPhone;
        $sibling->password = bcrypt('helloWorld');
        $sibling->education = $request->siblingEducation;
        $sibling->job = $request->siblingJob;
        $sibling->relation = $request->siblingRelation;
        $sibling->religion_id = $request->siblingReligion;
        $student->guardians()->save($sibling);

        if(isset($request->siblingID))
        {
          $tmSiblingID = $request->siblingID;
          if($tmSiblingID->getClientOriginalExtension() == 'png' || $tmSiblingID->getClientOriginalExtension() == 'jpg' || $tmSiblingID->getClientOriginalExtension() == 'pdf')
          {
            $tmSiblingID->move('system-data/students/'.$student->id.'/', 'sibling-'.$student->id."-".$sibling->id."-".$tmSiblingID->getClientOriginalName());
            $file = new File;
            $file->file_name = 'sibling-'.$student->id."-".$sibling->id."-".$tmSiblingID->getClientOriginalName();
            $file->description = $tmSiblingID->getClientOriginalName();
            $file->student_id = $student->id;
            $file->save();
          }
          else {
            $message = "Something Error with Documents";
          }
        }
        //
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
        $programs = Program::all();
        $classes = Grade::all();
        $student = Student::find($id);
        return view('administrator.m-student.editStudent',['student'=>$student,'religions'=>$religions,'banks'=>$banks,'programs'=>$programs,'classes'=>$classes]);
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
        $student->science_score = $request->studentSCI;
        $student->mathematic_score = $request->studentMTH;
        $student->indonesian_score = $request->studentIDN;
        $student->english_score = $request->studentENG;
        $student->total_score = $request->studentTotalScore;
        $student->religion_id = $request->studentReligion;
        $student->class_id = $request->studentClass;
        $student->bank_id = $request->studentBank;
        $student->save();

        if(isset($request->studentPhoto))
        {
          // Check File Type
          $tmStudentPhoto = $request->studentPhoto;
          if($tmStudentPhoto->getClientOriginalExtension() == 'png' || $tmStudentPhoto->getClientOriginalExtension() == 'jpg' || $tmStudentPhoto->getClientOriginalExtension() == 'pdf')
          {
            $tmStudentPhoto->move('system-data/students/'.$student->id.'/',"profile-".$request->studentNik);
          }
          else {
            $message = "Upload Profile Picture Failed";
          }
        }

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
