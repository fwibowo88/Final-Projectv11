<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\AcademicYear;
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

     public function filter(Request $request)
     {
         //
         $stDate = $request->absentFilterStDate;

         //Attritbute for Filter Parameter
         $years = AcademicYear::all();
         $students = Student::all();
         //Filter Result
         $absents = AbsentRecord::where($request->absentFilterStDate)
                                ->orWhere($request->absentFilterYear);
         return view('administrator.t-absent.allAbsent',['absents'=>$absents,'students'=>$students,'years'=>$years]);
     }

    public function index()
    {
        //
        $years = AcademicYear::all();
        $students = Student::all();
        $absents = AbsentRecord::all();
        return view('administrator.t-absent.allAbsent',['absents'=>$absents,'students'=>$students,'years'=>$years]);
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
        return view('administrator.t-absent.addAbsent',['students'=>$students]);
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
        $absent->status = 'confirmed';
        $absent->student_id = $request->absentStudent;
        $absent->employee_id = 1;//Binding to Auth User
        $absent->save();
        return redirect('/absent-record')->with('status','Absent Record Saved Successfully');
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
        $absent = AbsentRecord::find($id);
        return view('administrator.t-absent.detailAbsent',['absent'=>$absent]);
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
        $students = Student::all();
        $absent = AbsentRecord::find($id);
        return view('administrator.t-absent.editAbsent',['students'=>$students,'absent'=>$absent]);
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
        $absent->status = 'confirmed';
        $absent->student_id = $request->absentStudent;
        $absent->employee_id = 1; //BIND TO AUTH USER
        $absent->save();
        return redirect('/absent-record')->with('status','Success Edit Absent Record');
        $tmpAction = $_GET['action'];
        if($tmpAction == 'edit')
        {
          return $tmpAction;
        }
        else if($tmpAction == 'confirmed')
        {
          return 'confirmed';
          // $absent = AbsentRecord::find($id);
          // $absent->status = 'confirmed';
          // $absent->save();
        }
    }
    public function confirmed($id)
    {
      $absent = AbsentRecord::find($id);
      $absent->status = 'confirmed';
      $absent->employee_id = 1; //Binding to User Auth;
      $absent->save();
      return redirect('absent-record');
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
