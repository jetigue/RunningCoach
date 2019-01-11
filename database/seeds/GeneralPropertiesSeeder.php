<?php

use Illuminate\Database\Seeder;
use App\Models\Properties\General\Season;
use App\Models\Properties\General\Distance;

class GeneralPropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Season::class, 3)->create();
        factory(Distance::class, 1)->create();
    }
}
