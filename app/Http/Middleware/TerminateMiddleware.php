<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TerminateMiddleware
{
    protected $role;

    public function handle(Request $request, Closure $next)
    {
        $this->role = 'editor';
        echo "Your role is " . $this->role ."<br>";
        return $next($request);
    }

    public function terminate($request,$response)
    {
       if($this->role == 'editor'); {
          echo "<pre>" . 'this is only for admin' . "</pre>";
       }
    }
}
