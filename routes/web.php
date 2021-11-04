<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CategoryController;
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
Route::get('/post/{author}', [PostController::class , 'authorPosts'])->name('authName');
Route::get('/post/category/{category}', [PostController::class , 'catPosts'])->name('categoryname');


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
    Route::get('/admin',[PostController::class,'viewPosts'])->name('adminPage');
    Route::get('/admin/posts/create',[AdminPostController::class,'create'])->name('createPost');
    Route::post('/admin/posts',[PostController::class,'store'])->name('storePost');
    Route::get('/admin/posts/{post}/edit',[PostController::class,'editPosts'])->name('editPosts');
    Route::patch('/admin/posts/{post}',[PostController::class,'update'])->name('updatePost');
    Route::delete('/admin/posts/{post}',[PostController::class,'destroy'])->name('deletePost');
    Route::delete('/admin/posts/{comment}',[CommentController::class,'destroy'])->name('deleteComment');


    Route::get('/admin/users',[AdminPostController::class,'viewUsers'])->name('users');
    Route::get('/admin/users/{user}/edit',[AdminPostController::class,'editUsers'])->name('editUsers');
    Route::patch('/admin/users/{user}',[AdminPostController::class,'update'])->name('updateUser');
    Route::delete('/admin/users/{user}',[AdminPostController::class,'destroy'])->name('deleteUser');

    Route::get('/admin/categories/{category}/edit',[CategoryController::class,'editCategory'])->name('editCategory');
    Route::patch('/admin/categories/{category}',[CategoryController::class,'update'])->name('updateCategory');
    Route::delete('/admin/categories/{category}',[CategoryController::class,'destroy'])->name('deleteCategory');
    Route::get('/admin/categories',[CategoryController::class,'viewCategories'])->name('categories');

   });









