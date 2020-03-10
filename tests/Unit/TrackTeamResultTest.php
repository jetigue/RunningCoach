<?php

namespace Tests\Unit;

use App\Models\Properties\Races\Gender;
use App\Models\Properties\Races\Level;
use App\Models\Results\Track\TeamResult;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

//class TrackTeamResultTest extends TestCase
//{
//    use RefreshDatabase;
//
//    public function setUp()
//    {
//        parent::setUp();
//
//        $this->teamResult = factory(TeamResult::class)->create();
//    }

//    /** @test */
//    public function a_team_result_belongs_to_a_gender()
//    {
//        $this->signInAdmin();
//
//        $division = factory(Level::class)->create();
//        $gender = factory(Gender::class)->create();
//
//        $teamResult = factory(TeamResult::class)->create([
//            'division_id' => $division->id,
//            'gender_id' => $gender->id
//        ]);
//
//
//        $this->assertInstanceOf('App\Models\Properties\Races\Gender', $teamResult->gender);
//    }
//}
