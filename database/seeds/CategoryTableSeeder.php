<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Carbon\Carbon;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Mens','Woman','Children'];

        foreach($categories as $category){
            Category::create(['name' => $category,'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ]);
        }
    }
}
