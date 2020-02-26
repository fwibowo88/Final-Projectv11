<?php

namespace App\Http\Controllers;

use App\Violation;
use Illuminate\Http\Request;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $violations = Violation::all();
        return view('administrator.m-violation.allViolation',['violations'=>$violations]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('administrator.m-violation.addViolation');
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
        $violation = new Violation;
        $violation->name = $request->violationName;
        $violation->description = $request->violationDescription;
        $violation->point = $request->violationPoint;
        $violation->status = 'active';
        $violation->save();
        return redirect('/violation')->with('status','Master Violation Saved Succesfully !');
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
        $violation = Violation::find($id);
        return view('administrator.m-violation.editViolation',['violation'=>$violation]);
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
        $violation = Violation::find($id);
        $violation->name = $request->violationName;
        $violation->description = $request->violationDescription;
        $violation->point = $request->violationPoint;
        $violation->status = 'active';
        $violation->save();
        return redirect('/violation')->with('status','Success Edit Master Violation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $violation = Violation::find($id);
      if($violation->status == 'active')
      {
        $violation->status = 'inactive';
      }
      else
      {
        $violation->status = 'active';
      }
      $violation->save();
      return redirect('/violation');
    }
}
