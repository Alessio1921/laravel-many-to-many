<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 100; $i++) { 
            $newPost = new Post();
            $newPost->title = $faker->words(3, true);
            $newPost->user = $faker->name();
            $newPost->description = $faker->paragraph();
            $newPost->url = "https://picsum.photos/id/$i/400/300";
            $newPost->slug = Str::slug($newPost->title,"-");
            $newPost->save();
        }
    }
}
