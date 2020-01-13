<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BillingItem;

class BillingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $billings = BillingItem::all();
        return view('administrator.m-billing.allBilling',['billings'=>$billings]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('administrator.m-billing.addBilling');
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
        $billing = new BillingItem;
        $billing->name = $request->billingName;
        $billing->description = $request->billingDescription;
        $billing->price = $request->billingPrice;
        $billing->save();
        return redirect('/billing-Item')->with('status','Master Billing Saved Successfully !');
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
        $billing = BillingItem::find($id);
        return view('administrator.m-billing.editBilling',['billing'=>$billing]);
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
        $billing = BillingItem::find($id);
        $billing->name = $request->billingName;
        $billing->description = $request->billingDescription;
        $billing->price = $request->billingPrice;
        $billing->save();
        return redirect('/billing-Item')->with('status','Sucess Edit Master Billing');
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
        $billing = BillingItem::find($id);
        if($billing->status == 'active')
        {
          $billing->status = 'inactive';
        }
        else {
          $billing->status = 'active';
        }
        $billing->save();
        return redirect('/billing-Item');
    }
}
