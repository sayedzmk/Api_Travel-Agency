<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

// use App\admin;
use App\User;
class AuthController extends Controller
{
    // public function register(Request $request){
    //     $fileds=$request->validate([
    //         "name"=>"required|string",
    //         "email"=>"required|string|unique:admins,email",
    //         "password"=>"required|string|confirmed",
    //         "age"=>"required|numeric",
    //         "national_id"=>"required|numeric",
    //         "address"=>"required|string",
    //         "phone"=>"required|string",
    //         "gender"=>"required|string"
    //     ]);
    //     $admin=admin::create([
    //         "name"=>$fileds['name'],
    //         "email"=>$fileds['email'],
    //         "password"=>bcrypt($fileds['password']),
    //         "age"=>$fileds['age'],
    //         "national_id"=>$fileds['national_id'],
    //         "address"=>$fileds['address'],
    //         "phone"=>$fileds['phone'],
    //         "gender"=>$fileds['gender'],
    //     ]);
    //     $token=$admin->createToken("userToken")->plainTextToken;
    //     $response=[
    //         "admin"=>$admin,
    //         "User Token"=>$token
    //     ];
    //     return response($response,201);
    // }
    // public function login(Request $request){
    //     $fileds=$request->validate([
    //         "email"=>"required|string",
    //         "password"=>"required|string"
    //     ]);
    //     $admin=admin::where("email",$fileds['email'])->first();
    //     if(!$admin || !Hash::check($fileds['password'], $admin->password)){
    //         return response([
    //             "message"=>"incorrect Password|Eamil"
    //         ],401);
    //     }
    //     $token=$admin->createToken("userToken")->plainTextToken;
    //     $response=[
    //         "admin"=>$admin,
    //         "User Token"=>$token
    //     ];
    //     return response($response,201);
    // }
    // public function logout(Request $request){
    //     auth()->admin()->tokens()->delete();
    //     return [
    //         "message"=>"Logout Done"
    //     ];
    // }
    public function register(Request $request){
        $fileds=$request->validate([
            "name"=>"required|string",
            "email"=>"required|string|unique:users,email",
            "password"=>"required|string|confirmed"
        ]);
        $user=User::create([
            "name"=>$fileds['name'],
            "email"=>$fileds['email'],
            "password"=>bcrypt($fileds['password']),
        ]);
        $token=$user->createToken("userToken")->plainTextToken;
        $response=[
            "user"=>$user,
            "User Token"=>$token
        ];
        return response($response,201);
    }
    public function login(Request $request){
        $fileds=$request->validate([
            "email"=>"required|string",
            "password"=>"required|string"
        ]);
        $user=User::where("email",$fileds['email'])->first();
        if(!$user || !Hash::check($fileds['password'], $user->password)){
            return response([
                "message"=>"incorrect Password|Eamil"
            ],401);
        }
        $token=$user->createToken("userToken")->plainTextToken;
        $response=[
            "user"=>$user,
            "User Token"=>$token
        ];
        return response($response,201);
    }
    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return [
            "message"=>"Logout Done"
        ];
    }
}
