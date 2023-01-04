<?php

use App\Http\Controllers\CacheController;
use App\Http\Controllers\PostController;
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

Route::get('/cache', [CacheController::class,'cache']);
Route::get('/cache/forget', [CacheController::class,'cacheForget']);

Route::controller(PostController::class)->group(function(){
    Route::get('/users', 'index');
});

// 6379