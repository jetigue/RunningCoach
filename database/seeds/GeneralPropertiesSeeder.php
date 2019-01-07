<?php

use Illuminate\Database\Seeder;
use App\Models\Properties\General\Season;

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
    }
}
