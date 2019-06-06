<?php

use Illuminate\Database\Seeder;
use App\Models\Properties\Races\Division;
use App\Models\Properties\Races\Level;
use App\Models\Properties\Races\Event;
use App\Models\Properties\Races\Gender;
use App\Models\Properties\Races\RaceTitle;

class RacePropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Level::class, 3)->create();
        factory(Event::class, 4)->create();
        factory(Gender::class, 3)->create();
        factory(RaceTitle::class, 3)->create();
        factory(Division::class, 3)->create();
    }
}
