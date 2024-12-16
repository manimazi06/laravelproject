<?php

use App\Http\Controllers\Registrationscontroller;
//use App\Http\Controllers\Admin\Registrationscontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
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
Route::get('/sample', function () {
    $title="sample";
    return view('sample',compact('title'));
});

//Request data--post
Route::post('/get-user-data', function (Request $request) {
    // echo '<pre>';
    // print_r($request->all());
    // exit();

    return($request->all());
});

Route::get('samples/{name}',[SampleController::class,'sampleform']);



//view

Route::view('view','layouts.default');

//Get

Route::get('/home', function () {
    // echo '<pre>';
    // print_r($request->all());
    // exit();
    $title="Home Page";

    $user=1;
    $array=array(1=>'Bala',2=>'Mani');
   return view('home',compact('title','user','array'));
});

Route::get('create',[Registrationscontroller::class,'index']);
//Route::post('save',[Registrationscontroller::class,'save']);
Route::post('save',[Registrationscontroller::class,'save']);

Route::get('list',[Registrationscontroller::class,'list']);
Route::get('edit/{id}',[Registrationscontroller::class,'edit']);
Route::post('update/{id}',[Registrationscontroller::class,'update']);
Route::get('delete/{id}',[Registrationscontroller::class,'delete']);
Route::get('ajaxdata/{id}',[Registrationscontroller::class,'ajaxdata']);
Route::post('ajaxupdate/{id}',[Registrationscontroller::class,'ajaxupdate']);

//ADMIN
Route::get('admin/list',[Registrationscontroller::class,'list']);
Route::get('admin/edit/{id}',[Registrationscontroller::class,'edit']);
Route::post('admin/update/{id}',[Registrationscontroller::class,'update']);
Route::get('admin/delete/{id}',[Registrationscontroller::class,'delete']);





