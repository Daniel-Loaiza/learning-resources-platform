<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Resource;
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
        // $categories = Category::factory() -> count(5) -> create();

        Category::create(['name'=>'PHP']);
        Category::create(['name'=>'JavaScript']);
        Category::create(['name'=>'Vue.js']);
        Category::create(['name'=>'React']);

        // foreach ($categories as $category) {
            foreach (Category::all() as $category) {
            # code...
            Resource::factory() -> count(5) -> create([
                'category_id'=>$category->id
            ]);
        } 
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
