<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/', [PostController::class , 'index'])->name('home');

//Route::get('posts/{post}', function ($id) {
//    return view('post',['post' => Post::findOrFail($id)]);
//
//});

//Route Model Binding
Route::get('posts/{post:slug}', [PostController::class , 'show'] );

//Route::get('categories/{category:slug}', function (Category $category) {
//    return view('posts',[
//        'posts' => $category-> posts,
//        'currentCat' => $category,
//        'categories' => Category::all()
//
//    ]);
//
//});
//})-> where ('post', '[A-z_\-]+');
//Route::get('authors/{author:username}', function (User $author) {
//    return view('posts.index',[
//        'posts' => $author-> posts
//
//    ]);
//
//});






