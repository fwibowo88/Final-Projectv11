<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaint;
use App\Department;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $complaints = Complaint::all();
        return view('administrator.m-complaint.allComplaint',['complaints'=>$complaints]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departments = Department::all();
        return view('administrator.m-complaint.addComplaint',['departments'=>$departments]);
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
        $complaint = new Complaint;
        $complaint->name = $request->complaintName;
        $complaint->description = $request->complaintDescription;
        $complaint->department_id = $request->complaintDepartment;
        $complaint->save();
        return redirect('/complaint')->with('status','Master Bank Saved Successfully');
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
        $complaint = Complaint::find($id);
        $departments = Department::all();
        return view('administrator.m-complaint.editComplaint',['complaint'=>$complaint,'departments'=>$departments]);
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
        $complaint = Complaint::find($id);
        $complaint->name = $request->complaintName;
        $complaint->description = $request->complaintDescription;
        $complaint->department_id = $request->complaintDepartment;
        $complaint->save();
        return redirect('/complaint')->with('status','Success Edit Master Complaint');
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
        $complaint = Complaint::find($id);
        if($complaint->status == 'active')
        {
          $complaint->status = 'inactive';
        }
        else {
          $complaint->status = 'active';
        }
        $complaint->save();
        return redirect('/complaint');
    }
}
