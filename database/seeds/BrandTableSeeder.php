<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;
use Carbon\Carbon;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = ['Nike','Addidas','Topshop','Puma','Mango','Zara','Bershka','Asos','River Island'];

        foreach($brands as $brand){
            Brand::create(['name' => $brand,'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ]);
        }
    }
}
