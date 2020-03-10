<?php

use App\Models\Properties\Meets\Host;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\Meets\Timing;
use Illuminate\Database\Seeder;

class MeetPropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Host::class, 10)->create();
        factory(Timing::class, 2)->create();
        factory(\App\Models\Properties\Meets\CrossCountry\Venue::class, 10)->create();
        factory(\App\Models\Properties\Meets\Track\Venue::class, 10)->create();
        factory(Name::class, 10)->create();
    }
}
