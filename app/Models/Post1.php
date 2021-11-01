<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use mysql_xdevapi\Exception;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post1
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;


    public function __construct($title, $excerpt, $date, $body , $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all(){
        return cache()->rememberForever('posts.all',function (){
             return collect(File::files(resource_path("posts/")))
                 ->map(function ($file) {
                     return YamlFrontMatter::parseFile($file);
                 })
                 ->map(function ($document) {
                     return new Post1(
                         $document->title,
                         $document->excerpt,
                         $document->date,
                         $document->body(),
                         $document->slug
                     );
                 })
                 -> sortBy('date');
        });

        }
//        $files = File::files(resource_path("posts/"));
//        return array_map(function ($files){
//            return $files ->getContents();
//
//        },$files);

    public static function find($slug){
//            if (!file_exists($path = resource_path("posts/{$m}.html"))){
//               // return redirect('/');
//                throw new ModelNotFoundException();
//    }
//    return cache() -> remember("posts.{$m}",1200, fn() => file_get_contents($path));

    //return view('post',['post' => $post]);
        return static :: all()-> firstWhere('slug' , $slug);


}

    public static function findorfail($slug){

        $post = static :: find($slug);
        if(!$post){
            throw new ModelNotFoundException();
        }
        return $post;

    }

}
