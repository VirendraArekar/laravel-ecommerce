<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Size;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = ['XS','S','M','L','XL','XLL'];

        foreach($sizes as $size){
            Size::create(['name' => $size,'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ]);
        }
    }
}
