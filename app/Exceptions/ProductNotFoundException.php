<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class ProductNotFoundException extends Exception
{
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        if($request->is('api/*')){
            return response()->json([
                'error' => [
                    'code' => 404,
                    'title' => 'Product not Found',
                    'detail' => 'unable to located the product with given title'
                ]
            ]);
        }
        // return [
        //     'error' => [
        //         'code' => 404,
        //         'title' => 'Product not Found',
        //         'detail' => 'unable to located the product with given title'
        //     ]
        // ];

        return view('errors.404');
    }
}
