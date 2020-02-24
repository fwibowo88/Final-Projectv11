<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::all();
        return view('administrator.m-employee.allEmployee',['employees'=>$employees]);
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
        return view('administrator.m-employee.addEmployee',['departments'=>$departments]);
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
        $employee = new Employee;
        $employee->nik = $request->employeeNik;
        $employee->password = $request->employeePassword;
        $employee->fname = $request->employeeFname;
        $employee->lname = $request->employeeLname;
        $employee->address = $request->employeeAddress;
        $employee->email = $request->employeeMail;
        $employee->phone = $request->employeePhone;
        $employee->save();
        $employee->department()->sync([$request->employeeDepartment]);
        return redirect('/employee')->with('status','Master Employee Saved Succesfully !');
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
        $employee = Employee::find($id);
        $departments = Department::all();
        return view('administrator.m-employee.editEmployee',['employee'=>$employee,'departments'=>$departments]);
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
        $employee = Employee::find($id);
        $employee->nik = $request->employeeNik;
        $employee->password = $request->employeePassword;
        $employee->fname = $request->employeeFname;
        $employee->lname = $request->employeeLname;
        $employee->address = $request->employeeAddress;
        $employee->email = $request->employeeMail;
        $employee->phone = $request->employeePhone;
        $employee->save();
        $employee->department()->sync($request->employeeDepartment);
        return redirect('/employee')->with('status','Success Edit Master Employee');
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
        $employee = Employee::find($id);
        if($employee->status == 'active')
        {
          $employee->status = 'inactive';
        }
        else {
          $employee->status = 'active';
        }
        $employee->save();
        return redirect('/employee');
    }
}
