<?php

namespace Tests\Feature;

use App\Models\Meets\TrackMeet;
use App\Models\Properties\General\Season;
use App\Models\Properties\Races\Gender;
use App\Models\Properties\Races\Level;
use App\Models\Results\Track\TeamResult;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

//class ManageTrackTeamResultTest extends TestCase
{
//    use RefreshDatabase;

//    /** @test */
//    public function testExample()
//    {
//        $this->signInAdmin();
//
//        $season = factory(Season::class)->create();
//
//        $trackMeet = factory(TrackMeet::class)->create([
//            'season_id' => $season->id
//            ]
//        );
//
//        $division = factory(Level::class)->create();
//        $gender = factory(Gender::class)->create();
//
//        $teamResult = factory(TeamResult::class)->create([
//            'track_meet_id' => $trackMeet->id,
//            'division_id' => $division->id,
//            'gender_id' => $gender->id
//        ]);
//
//    }
}
