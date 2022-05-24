<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Funny", "Love" , "Nature" , "Animals", "Sad", "Angry" , "sport" , "Politics", "Culture"];
        for ($i=0; $i < count($categories) ; $i++) { 
            $NewCategory = new Category();
            $NewCategory->name = $categories[$i];
            $NewCategory->save();
        }
    }
}

