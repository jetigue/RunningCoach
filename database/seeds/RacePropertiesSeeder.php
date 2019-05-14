<?php

use Illuminate\Database\Seeder;
use App\Models\Properties\Races\Event;
use App\Models\Properties\Races\Gender;
use App\Models\Properties\Races\Division;

class RacePropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Division::class, 3)->create();
        factory(Event::class, 4)->create();
        factory(Gender::class, 3)->create();
    }
}
