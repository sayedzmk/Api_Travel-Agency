<?php

namespace App\Http\Controllers;

use App\travelAgency;
use Illuminate\Http\Request;

class TravelAgencyController extends Controller
{
    public function index()
    {
        $travelAgency=travelAgency::all();
        return $travelAgency;
    }

    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|string",
            "legel_no"=>"required|numeric",
            "bank_account"=>"required|numeric",
            "phone"=>"required|numeric",
            "address"=>"required|string",
            "password"=>"required|string",
            "image"=>"required|string",
        ]);
        $image=$request->file('image');
        if($request->hasFile('image')){
            $new_image=$image->getClientOriginalName();
            $image->move(public_path('/upload/image'),$new_image);
        }
        // $travelAgency=news::create([
        //     'name'=>$request->name,
        //     'legel_no'=>$request->legel_no,
        //     'bank_account'=>$request->bank_account,
        //     'phone'=>$request->phone,
        //     'address'=>$request->address,
        //     'password'=>$request->password,
        //     'image'=>$request->image,
        // ]);
        // $respons=[
        //     "travel_agency"=>$travelAgency,
        //     "message"=>"success Added this Object"
        // ];
        // return response($respons,201);
        return travelAgency::create($request->all());
    }
    public function show($id)
    {
        return travelAgency::find($id);

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            "name"=>"required|string",
            "legel_no"=>"required|numeric",
            "bank_account"=>"required|numeric",
            "phone"=>"required|numeric",
            "address"=>"required|string",
            "password"=>"required|string",
            "image"=>"required|string",
        ]);
        $image=$request->file('image');
        if($request->hasFile('image')){
            $new_image=$image->getClientOriginalName();
            $image->move(public_path('/upload/image'),$new_image);
        }
        $travelAgency=travelAgency::find($id);
        $travelAgency->update($request->all());
        return $travelAgency;
    }



    public function destroy($id)
    {
        return travelAgency::destroy($id);
    }
}
