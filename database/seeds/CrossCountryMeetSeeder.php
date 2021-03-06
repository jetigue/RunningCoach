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
        factory(\App\Models\Meets\CrossCountryMeet::class, 50)->create();
        factory(\App\Models\Results\CrossCountry\TeamResult::class, 150)->create();
        factory(\App\Models\Results\CrossCountry\Result::class, 500)->create();
    }
}
