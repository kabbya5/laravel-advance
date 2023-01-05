<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/check-role/{role}', function ($role){
    return response()->json($role);
})->middleware('role');

Route::get('/user/role/', function(Request $request){
    return "Role is " .$request->role;
    // $_GET['role'];
});

Route::get('/terminate', function (){
    return 'test';
})->middleware('terminate');


