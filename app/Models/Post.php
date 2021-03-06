<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
  //  protected $fillable = ['title','excerpt','body'];
    protected $with = ['category','author'];
    public function category(){
        return $this-> belongsTo(Category::class,);
    }
    //filter posts due to word
    public function scopeFilter($query,array $filters){
        $query->when($filters['search']?? false,function ($query,$search){
            $query ->where(function ($query) use ($search) {
                $query -> where('title','like','%'.$search.'%')
                    ->orWhere('body','like','%'.$search.'%');
            }) ;

        });

//filter posts from dropdown list -> categories
        $query->when($filters['category']?? false,function ($query,$category){
            $query
                ->whereHas('category', function ($query) use ($category) {
                    return $query->where('slug', $category);
                });

        });


        $query->when($filters['author']?? false,function ($query,$author){
            $query
                ->whereHas('author', function ($query) use ($author) {
                    return $query->where('username','like', $author);
                });
        });
    }
    public function comments(){
        return $this-> hasMany(Comment::class);
    }

    public function author(){
        return $this-> belongsTo(User::class,'user_id');
    }
}
