<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminDashboardController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin 
Route::group(['prefix' => 'admin', 'middleware' => 'admin', ], function(){  
    Route::controller(AdminDashboardController::class)->group(function (){
        Route::get('/dashboard','adminDashboard')->name('admin.dashboard');
    });
});
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/login','adminLogin');
    Route::get('/admin/register','adminRegister');
    Route::post('/admin/register','adminRegisterPost')->name('admin.register');
    Route::post('/admin/login','adminLoginPost')->name('admin.login');
});
