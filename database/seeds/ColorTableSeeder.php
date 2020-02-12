<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Color;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = ['white', 'green', 'red','blue','orange','brown','black','yellow'];

        foreach($colors as $color){
            Color::create(['name' => $color,'created_at' => Carbon::now(), 'updated_at' => Carbon::now() ]);
        }
    }
}
