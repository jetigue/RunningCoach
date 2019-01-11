<?php

use Illuminate\Database\Seeder;
use App\Models\Properties\Races\Division;
use App\Models\Properties\Races\Event;
use App\Models\Properties\Races\Gender;

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
        factory(Event::class, 1)->create();
        factory(Gender::class, 3)->create();
    }
}
