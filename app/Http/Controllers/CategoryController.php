<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewCategories(){

        return view('admin.categories.categories');

    }
    public function editCategory(Category $category){

        return view('admin.categories.editCategory' ,['category' => $category]);

    }
    public function update(Category $category){

        $attributes=request()->validate([
            'name' =>'required',
            'slug'=>'required',
        ]);
        $category->update($attributes);
        return back()->with('success','Category updated');
    }

    public function destroy(Category $category){
        $posts=Post::whereHas('category',function ($query) use ($category){
            $query->where('category_id',$category->id);
        })->get();
//        return ($posts);
        foreach ($posts as $post){
            $post->category_id = 1;
            $post->save();

        }
        $category->delete();
        return back()->with('success','Category deleted');

    }

}
