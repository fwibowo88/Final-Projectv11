<?php

namespace App\Http\Controllers;

use App\Religion;
use App\Program;
use App\Bank;
use App\Token;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admission.landing');
    }

    public function viewRegister()
    {
        //
        $banks = Bank::all();
        $programs = Program::all();
        $religions = Religion::all();
        return view('admission.register',['banks'=>$banks,'programs'=>$programs,'religions'=>$religions]);
    }

    public function viewContact()
    {
        //
        return view('admission.contact');
    }

    public function checkToken(Request $request)
    {
        //
        $param = ['code' => $request->tmToken, 'status' => 'active'];
        $token = Token::where($param)->get();
        if(count($token) == 1)
        {
          return response()->json(['status'=>'OK']);
        }
        else {
          return response()->json(['status'=>'ERR']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}
