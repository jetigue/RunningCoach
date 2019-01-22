<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Properties\General\Season;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeasonTest extends TestCase
{
    use RefreshDatabase;

    protected $season;

    public function setUp()
    {
        parent::setUp();

        $this->season = factory(Season::class)->create();
    }

    /** @test */
//    public function it_has_a_path()
//    {
//
//        $this->assertEquals(
//            '/seasons/' . $this->id, $this->season->path());
//    }

    /** @test */
    function a_season_has_many_meet_names()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->season->meetNames);
    }

    /** @test */
    function a_season_has_many_venues()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->season->venues);
    }
}