<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $categories = collect(['Programming','Network','Design']);
       $categories->each(function($c){
       	\App\Category::create([
       		'name'=> $c,
       		'slug'=>\Str::slug($c)
       	]);
       });
    }
}
