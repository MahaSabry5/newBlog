<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
  //  protected $fillable = ['title','excerpt','body'];
    protected $guarded = [];
    protected $with = ['category','author'];
    public function category(){
        return $this-> belongsTo(Category::class);
    }
    public function scopeFilter($query,array $filters){
        $query->when($filters['search']?? false,function ($query,$search){
            $query ->where(function ($query) use ($search) {
                $query -> where('title','like','%'.$search.'%')
                    ->orWhere('body','like','%'.$search.'%');
            }) ;

        });


        $query->when($filters['category']?? false,function ($query,$category){
                $query
//                    -> whereExists(function ($query) use ($category) {
//                        return $query->from('categories')
//                            ->whereColumn('categories.id', 'posts.category_id')
//                            ->where('categories.slug', $category);
            ->whereHas('category', function ($query) use ($category) {
                        return $query->where('slug', $category);
                    });

        });
//        if($filters['search']?? false){
//            $query
//                -> where('title','like','%'.request('search').'%')
//                ->orWhere('body','like','%'.request('search').'%');
//        }
        $query->when($filters['author']?? false,function ($query,$author){
            $query
                ->whereHas('author', function ($query) use ($author) {
                    return $query->where('username', $author);
                });
        });


    }

    public function author(){
        return $this-> belongsTo(User::class,'user_id');
    }
}
