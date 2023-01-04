<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Redis;

class PostController extends Controller
{
    public function index(){
        $time_start = microtime(as_float:true);
        $cacheduser = Redis::get('users');
        $tiem_end = microtime(as_float:true);
        $exceution_time = ($time_start - $tiem_end);

        if(isset($cacheduser)){
            $users = json_decode($cacheduser);

            return view('users',compact('users','exceution_time'));
        }else{
            $time_start = microtime(as_float:true);
            $users = User::all();
            $tiem_end = microtime(as_float:true);
            $exceution_time = ($time_start - $tiem_end);

            Redis::set('users',json_encode($users));

            return view('users',compact('users','exceution_time'));
        }
    }
}
