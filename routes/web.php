<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/exception/handeling', function(){
    try{
        $user = User::where('email', 'admm@gmail.com')->firstOrFail();
        $user->load('product');
        return $user;
        
    }
    catch(\Exception $e){
        dd(get_class($e));
        return view('exception');
    }
});
