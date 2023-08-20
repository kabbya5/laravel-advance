<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
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


Auth::routes();


Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/login','adminLoginForm');
    Route::get('/admin/register/', 'adminRegister')->name('admin.register');
    Route::post('/amdin/login', 'login')->name('admin.login');
    Route::post('/admin/register/', 'register')->name('admin.register.post');
});



Route::controller(ProductController::class)->group(function(){
    Route::get('/ajax-form','create')->name('ajax.form');
    Route::post('/ajax/form/store','store')->name('ajax.store');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/weather', function (){
    $weatherService = app('weather');
    $weather = $weatherService->getCurrentWeather('New York');
    return $weather;
});