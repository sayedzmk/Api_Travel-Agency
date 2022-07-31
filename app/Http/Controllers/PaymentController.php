<?php

namespace App\Http\Controllers;

use App\payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index()
    {
        $payment=payment::all();
        return $payment;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            "amount"=>"required|numeric",
            "user_id"=>"required|numeric",
            "trip_id"=>"required|numeric"
        ]);
        return payment::create($request->all());
    }

    public function show($id)
    {
        return payment::find($id);
    }


    public function edit(payment $payment)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "amount"=>"required|numeric",
            "user_id"=>"required|numeric",
            "trip_id"=>"required|numeric"
        ]);
        $payment= payment::find($id);
        $payment->update($request->all());
        return $payment;
    }

    public function destroy($id)
    {
        return payment::destroy($id);
    }
}
