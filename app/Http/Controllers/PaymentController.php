<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PaymentController extends Controller
{
    public function getPaymentService(){
        
        $shipping = app()->make('Shipping');
        // $shipping->setName('kabbya12');
        $name = $shipping->getName();

        echo $name ; die;
    }
}
