<?php

use Illuminate\Http\Request;
use App\District;
use App\Upazila;
use App\Division;
use App\Nid;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getdist', function(Request $request){
    $p = Division::where('bn_name',$request->div)->first()->id;
    return District::where('division_id',$p)->get();
});
Route::get('getupz', function(Request $request){
    $p = District::where('bn_name',$request->dist)->first()->id;
    return Upazila::where('district_id',$p)->get();
});

Route::get('nid', function(Request $request){
    return Nid::where('no', $request->no)->firstOrFail();
});