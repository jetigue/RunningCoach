<?php

use Illuminate\Database\Seeder;
use App\Models\Properties\Meets\Host;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\Meets\Venue;
use App\Models\Properties\Meets\Timing;

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
        factory(Venue::class, 10)->create();
        factory(Name::class, 10)->create();
    }
}
