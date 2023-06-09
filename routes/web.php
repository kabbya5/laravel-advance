<?php

use App\Http\Requests\StorePostRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/storage-link', function(){
    return view('create_post');
});

Route::post('/create/post', function(StorePostRequest $request){
    $data = $request->except('post_img');
    $data['author_id'] = 2;
    $data['view_count'] = rand(1,500);
    $data['slug'] = str_slug($data['post_title']);

    if($request->hasFile('post_img')){
        $image = $request->file('post_img');
        $name = time().'.'.$image->getClientOriginalExtension();
        $path = 'public/images/post';

        $image->storeAs($path,$name);

        $data['post_img'] = $name;
    }

    Post::create($data);
})->name('create.post');


Route::get('/show/posts', function(){
    $posts = Post::latest()->limit(4)->get();
    return view('post_show',compact('posts'));
});