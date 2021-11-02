<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Resource_;

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
        return view('posts.show',['post' => $post]);

    }
    public function create(){

        return view('admin.posts.create');

    }
    public function store(){
        $attributes=request()->validate([
            'title' =>'required',
            'slug'=>['required',Rule::unique('posts','slug')],
            'body' =>'required',
            'excerpt' =>'required',
            'category_id' =>['required',Rule::exists('categories','id')]

        ]);
        $attributes['user_id']=auth()->id();
        Post::create($attributes);

        return redirect('/');


    }

}
