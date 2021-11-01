<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){

        return view('posts.index',[
            'posts' => Post::latest()->filter(request(['search','category','author']))->paginate(6)->withQueryString()
            //get the latest created posts at the top
            //'posts' => Post::with('category')->get() //show post due to oldest ones
        ]);


    }
    public function show(Post $post){
        return view('post.show',['post' => $post]);

    }

}