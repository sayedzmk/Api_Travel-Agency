<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelAgencyController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::resources([
//     "/travel"=>"TravelAgencyController",
//     "/trip"=>"TripController"
// ]);

//public Route
//travelAgency
Route::get('getAllDatatravelAgency', "TravelAgencyController@index");
Route::get('showAllDatatravelAgency', "TravelAgencyController@show");
Route::get('getAllDatatrip', "TripController@index");
Route::get('showAllDatatrip', "TripController@show");
Route::get('getallPyment',"PaymentController@index");
Route::post('register', "AuthController@register");
Route::post('login', "AuthController@login");

// Private route
Route::group(['middleware'=>["auth:sanctum"]],function(){
    Route::post('saveDatatravelAgency', "TravelAgencyController@store");
    Route::put('updateDatatravelAgency/{id}', "TravelAgencyController@update");
    Route::delete('deleteDatatravelAgency/{id}', "TravelAgencyController@destroy");
    Route::put('updateDatatrip/{id}', "TripController@update");
    Route::delete('deleteDatatrip/{id}', "TripController@destroy");
    Route::post('savePyment',"PaymentController@store");
    Route::put('updatePyment',"PaymentController@update");
    Route::delete('deletPyment',"PaymentController@destroy");
    Route::post('logout', "AuthController@logout");

});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
