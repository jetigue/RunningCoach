<?php

use Illuminate\Database\Seeder;
use App\Models\Properties\Races\Division;
use App\Models\Properties\Races\Level;
use App\Models\Properties\Races\CrossCountry\Event;
use App\Models\Properties\Races\Gender;
use App\Models\Properties\Races\Title;

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
        factory(Event::class, 2)->create();
        factory(Gender::class, 2)->create();
        factory(Title::class, 3)->create();
        factory(Division::class, 2)->create();
        factory(\App\Models\Properties\Races\Track\Event::class, 2)->create();
    }
}
