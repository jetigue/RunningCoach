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
        // $this->call(UsersTableSeeder::class);
        $this->call(GeneralPropertiesSeeder::class);
        $this->call(MeetPropertiesSeeder::class);
        $this->call(RacePropertiesSeeder::class);
        $this->call(AthletesTableSeeder::class);
    }
}
