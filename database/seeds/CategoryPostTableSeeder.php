<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Category;
use App\Post;


class CategoryPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categoryIds = Category::pluck('id')->toArray();
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->Categories()->sync($faker->randomElement($categoryIds));
        }
    }
}
