<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index',[
            'posts' =>Post::paginate(50)
        ]);
    }
    public function create(){

        return view('admin.posts.create');

    }
    public function viewUsers(){

        return view('admin.users.users');

    }
    public function editUsers(User $user){
        return view('admin.users.editUsers' ,['user' => $user]);
    }
    public function update(User $user){

        $attributes=request()->validate([
            'name' =>'required',
            'username'=>'required',
            'email' =>'required'
        ]);
        $user->update($attributes);
        return back()->with('success','User updated');
    }

    public function destroy(User $user){
        $posts=Post::whereHas('author',function ($query) use ($user){
            $query->where('user_id',$user->id);
        })->get();
        foreach ($posts as $post){
            $post->user_id = 1;
            $post->save();
        }
       // return($posts);
        $user->delete();
        return back()->with('success','User deleted');

    }


}
