<?php

namespace Tests\Unit;

use App\Models\Properties\General\Season;
use App\Models\Properties\Meets\CrossCountry\Venue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
            '/seasons/'.$this->season->slug, $this->season->path());
    }

    /** @test */
    public function a_season_has_many_meet_names()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->season->meetNames);
    }

    /** @test */
    public function a_season_has_many_track_meets()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->season->trackMeets);
    }
}
