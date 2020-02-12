<?php

namespace Tests\Unit;

use App\Models\Properties\Meets\CrossCountry\Venue;
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
    public function it_has_a_path()
    {
        $this->assertEquals(
            '/seasons/' . $this->season->slug, $this->season->path());
    }

    /** @test */
    function a_season_has_many_meet_names()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->season->meetNames);
    }

    /** @test */
    function a_season_has_many_cross_country_venues()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->season->crossCountryVenues);
    }

    /** @test */
    function a_season_has_many_track_meets()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->season->trackMeets);
    }
}
