<?php

namespace App\Http\Controllers;
//https://www.honeybadger.io/blog/laravel-caching-redis/
//https://www.youtube.com/watch?v=3mAX8pjAtyU
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function cache(){
        $this->putCache();
        $cache = $this->getCache();

        $this->rememberCache();

        return response()->json($cache);
        
    }

    private function putCache()
    {
        Cache::put('test', "testing laravel cache", 1);
    }

    private function getCache()
    {
        return Cache::get(key:'test');
    }

    public function cacheForget(){
        Cache::forget('test');
    }

    private function rememberCache(){
        Cache::remember('test', 1, function(){
            dd('test'); // Model::all();
        });
    }
}
