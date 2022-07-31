<?php

namespace App\Http\Controllers;

use App\trip;
use Illuminate\Http\Request;

class TripController extends Controller
{

    public function index()
    {
        $trip=Trip::all();
        return $trip;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            "state"=>"required|string",
            "price"=>"required|numeric",
            "description"=>"required|string",
            "date"=>"required|string",
            "agency_id"=>"required"

        ]);
        return Trip::create($request->all());
    }

    public function show($id)
    {
        return Trip::find($id);
    }

    public function edit(trip $trip)
    {
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "state"=>"required|string",
            "price"=>"required|numeric",
            "description"=>"required|string",
            "date"=>"required|string",
            "agency_id"=>"required"

        ]);
        $trip= Trip::find($id);
        $trip->update($request->all());
        return $trip;

    }

    public function destroy($id)
    {
        return Trip::destroy($id);
    }
}
