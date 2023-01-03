<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\TestJobEmail;
use App\Mail\SendMail;
use Mail;


class JobsController extends Controller
{
    public function runJobsAndEmail(){
        $email = 'kabbya44@gmail.com';
        $data = ' simple test email job and queue';

        TestJobEmail::dispatch($email,$data);
        // Mail::to($email)->send(new SendMail($data));

        dd('email send success');
        
    }
}
