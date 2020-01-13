<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banks = Bank::all();
        return view('administrator.m-bank.allBank',['banks'=>$banks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $banks = Bank::all();
        return view('administrator.m-bank.addBank');
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
        $bank = new Bank;
        $bank->name = $request->bankName;
        $bank->description = $request->bankDescription;
        $bank->save();
        return redirect('/bank')->with('status', 'Master Bank Saved Successfully !');
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
        $bank = Bank::find($id);
        return view('administrator.m-bank.editBank',['bank'=>$bank]);
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
        $bank = Bank::find($id);
        $bank->name = $request->bankName;
        $bank->description = $request->bankDescription;
        $bank->save();
        return redirect('/bank')->with('status', 'Success Edit Master Bank');
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
        $bank = Bank::find($id);
        if($bank->status == 'active')
        {
          $bank->status = 'inactive';
        }
        else
        {
          $bank->status = 'active';
        }
        $bank->save();
        return redirect('/bank');
    }
}
