<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::truncate();//to remove any records exists before seeding again
//        Post::truncate();
//        Category::truncate();

        Post::factory(6)->create([
            'user_id' => $user->id
        ]);

        //$user = User:: factory()->create();


//        $personal = Category::create([
//            'name' => 'Personal',
//            'slug' => 'personal'
//        ]);
//        $work = Category::create([
//            'name' => 'Work',
//            'slug' => 'work'
//        ]);
//        $family = Category::create([
//            'name' => 'Family',
//            'slug' => 'family'
//        ]);
//
//        Post::create([
//            'user_id' => $user -> id,
//            'category_id' => $family -> id,
//            'title' => 'First Post',
//            'slug' => 'myFirstPost',
//            'excerpt' => '<p>Lorem ipsum dolor sit amet</p>',
//            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
//
//        ]);
//        Post::create([
//            'user_id' => $user -> id,
//            'category_id' => $personal -> id,
//            'title' => 'Second Post',
//            'slug' => 'mySecondPost',
//            'excerpt' => '<p>Lorem ipsum dolor sit amet</p>',
//            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
//
//        ]);
    }
}
