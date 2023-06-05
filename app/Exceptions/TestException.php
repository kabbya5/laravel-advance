<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class TestException extends Exception
{
    public function render(Request $request){
        $status = 400;
        $error = "someting is wrong";
        $help = "contact tha  developer team";

        return response(["error" => $error, "help" => $help, "status" =>  $status]);
    }
}
