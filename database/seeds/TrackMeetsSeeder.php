<?php

use App\Models\Meets\TrackMeet;
use Illuminate\Database\Seeder;
use App\Models\Results\Track\Result;
use App\Models\Results\Track\TeamResult;

class TrackMeetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TrackMeet::class, 10)->create();
        factory(TeamResult::class, 30)->create();
        factory(Result::class, 100)->create();
    }
}
