<?php

use App\Exceptions\ProductNotFoundException;
use App\Services\ProductService;
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

Route::get('/product/{slug}', function ($slug){
  //  try{
  //    $product = Product::where('slug', $slug)->firstOrFail();
  //  }
  //  catch(ProductNotFoundException $exception){
  //     return view('errors.404',[ $exception->getMessage()]);
  //  }
  try{
    $product = (new ProductService())->findByProduct($slug);
  }
  catch(ProductNotFoundException $e){
    return view('errors.404',['error' => $e->getMessage()]);
  }
   return 'Success';

    
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
