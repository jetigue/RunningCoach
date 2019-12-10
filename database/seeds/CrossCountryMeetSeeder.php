<?php

use Illuminate\Database\Seeder;

class CrossCountryMeetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Meets\CrossCountryMeet', 50)->create();
        factory('App\Models\Results\CrossCountry\TeamResult', 100)->create();
    }
}
