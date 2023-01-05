<?php

use App\Events\BrodcostProcess;
use App\Events\UserProcessedEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// https://www.youtube.com/watch?v=FtTvfhAOAi4 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/event', function (){
    $user = User::latest()->first();
    event(new UserProcessedEvent($user));
    dd('success');
    return back();
});

Route::post('/send', function(Request $request){
    $message = $request->message; 
    $title = $request->title;
    
    event(new BrodcostProcess($message,$title));
    return back();
})->name('message.send');
