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
//    public function __construct()
//    {
//        $this->scopeFilter();
//    }

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
    public function authorPosts(Request $request){
       //return $request;
        $posts=Post::whereHas('author',function ($query) use ($request){
            $query->where('username','like',$request->author);
        })->get();
        return view('posts.view',['posts'=>$posts]);
    }
    public function catPosts($category){
        //return $category;
        $posts=Post::whereHas('category',function ($query)use($category){
            $query->where('category_id',$category);
        })->get();
        return view('posts.view',['posts'=>$posts]);
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

    public function viewPosts(){

        return view('admin.posts.index');

    }
    public function editPosts(Post $post){

        return view('admin.posts.editPost' ,['post' => $post]);

    }
    public function update(Post $post){

        $attributes=request()->validate([
            'title' =>'required',
            'slug'=>['required',Rule::unique('posts','slug')->ignore($post->id)],
            'body' =>'required',
            'excerpt' =>'required',
            'category_id' =>['required',Rule::exists('categories','id')]

        ]);
        $post->update($attributes);
        return back()->with('success','Post updated');

    }
    public function destroy(Post $post){
        $post->delete();
        return back()->with('success','Post deleted');

    }

}
