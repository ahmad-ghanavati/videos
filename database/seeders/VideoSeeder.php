<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Video::factory(2)->create(['name'=>' شهلا قنواتی']);
         Video::factory(2)->create(['name'=>'احمد قنواتی']);
         Video::factory(2)->create(['name'=>'ناهید قنواتی']);
         Video::factory(2)->create(['name'=>'علیرضا قنواتی']);
         Video::factory(1)->create(['name'=>'محمدرضا قنواتی']);
        Video::factory(50)->create();
    }
}
