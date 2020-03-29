<?php

namespace Tests\Unit;

use App\Models\Meets\TrackMeet;
use App\Models\Properties\General\Season;
use App\Models\Properties\General\TrackSurface;
use App\Models\Properties\Meets\Host;
use App\Models\Properties\Meets\Track\Name;
use App\Models\Properties\Meets\Timing;
use App\Models\Properties\Meets\Track\Venue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Setup\TrackMeetFactory;
use Tests\TestCase;

class TrackMeetTest extends TestCase
{
    use RefreshDatabase;

    protected $trackMeet;

    protected function setUp(): void
    {
        parent::setUp();

        $season = factory(Season::class)->states('outdoor')->create();
        $surface = factory(TrackSurface::class)->create();
        $meetName = factory(Name::class)->create();
        $venue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $host = factory(Host::class)->create();
        $timing = factory(Timing::class)->create();

        $this->trackMeet = factory(TrackMeet::class)->create([
            'track_meet_name_id' => $meetName->id,
            'season_id' => $season->id,
            'track_venue_id' => $venue->id,
            'host_id' => $host->id,
            'timing_method_id' => $timing->id,
        ]);
    }

    /** @test */
    public function a_track_meet_belongs_to_a_host()
    {
        $this->assertInstanceOf(Host::class, $this->trackMeet->host);
    }

    /** @test */
    public function a_track_meet_belongs_to_a_meet_name()
    {
        $this->assertInstanceOf(Name::class, $this->trackMeet->name);
    }

    /** @test */
    public function a_track_meet_belongs_to_a_season()
    {
        $this->assertInstanceOf(Season::class, $this->trackMeet->season);
    }

    /** @test */
    public function a_track_meet_belongs_to_a_timing_method()
    {
        $this->assertInstanceOf(Timing::class, $this->trackMeet->timing);
    }

    /** @test */
    public function a_track_meet_belongs_to_a_venue()
    {
        $this->withoutExceptionHandling();
        $this->assertInstanceOf(Venue::class, $this->trackMeet->venue);
    }
}
