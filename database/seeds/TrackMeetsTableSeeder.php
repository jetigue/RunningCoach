<?php

use Illuminate\Database\Seeder;
use App\Models\Meets\TrackMeet;

class TrackMeetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TrackMeet::class, 10)->create();
    }
}
