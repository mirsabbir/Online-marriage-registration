<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin','MarriageController@dashboard')->middleware(['auth','can:access-admin']);
Route::get('/admin/marriage/register', 'MarriageController@register')->middleware(['auth','can:access-admin']);
Route::post('/admin/marriage/register', 'MarriageController@registerPost')->middleware(['auth','can:access-admin']);
Route::get('/admin/marriage/index', 'MarriageController@index')->middleware(['auth','can:access-admin']);
Route::get('/admin/marriage/divorce', 'MarriageController@divorce')->middleware(['auth','can:access-admin']);
Route::get('/admin/marriage/update', 'MarriageController@update')->middleware(['auth','can:access-admin']);




// nid

Route::resource('/superadmin/nids', 'NidController')->middleware(['auth','can:access-superadmin']);
Route::resource('/superadmin/admins', 'AdminController')->middleware(['auth','can:access-superadmin']);
Route::get('/superadmin', 'AdminController@dashboard')->middleware(['auth','can:access-superadmin']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
