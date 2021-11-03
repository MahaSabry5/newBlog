<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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

//Route Model Binding
Route::get('/posts/{post:slug}', [PostController::class , 'show'])->name('post.show');
Route::post('/posts/{post:slug}/comments', [CommentController::class , 'store'])->name('storeComment');


Route::post('/logout', [SessionsController::class , 'destroy'])->name('logout')->middleware('auth');


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class , 'create'])->name('createUser');
    Route::post('/register', [RegisterController::class , 'store'])->name('storeUser');
    Route::get('/login', [SessionsController::class , 'create'])->name('createSession');
    Route::post('/login', [SessionsController::class , 'store'])->name('storeSession');
});
Route::group(['middleware' => 'can:admin'], function () {
    //Route::get('/admin/posts',[AdminPostController::class,'index'])->name('');
    Route::get('/admin/posts/create',[PostController::class,'create'])->name('createPost');
    Route::post('/admin/posts',[PostController::class,'store'])->name('storePost');
    Route::delete('/admin/posts/{comment}',[CommentController::class,'destroy'])->name('deleteComment');
});









