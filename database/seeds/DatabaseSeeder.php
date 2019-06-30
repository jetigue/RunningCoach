<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GeneralPropertiesSeeder::class);
        $this->call(MeetPropertiesSeeder::class);
        $this->call(RacePropertiesSeeder::class);
        $this->call(AthletesTableSeeder::class);
        $this->call(TrackMeetsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TeamAdministrationSeeder::class);
        $this->call(RunningLogSeeder::class);
    }
}
