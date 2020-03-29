<?php

namespace Tests\Feature;

use App\Models\Meets\TrackMeet;
use App\Models\Properties\General\Season;
use App\Models\Properties\General\TrackSurface;
use App\Models\Properties\Meets\Host;
use App\Models\Properties\Meets\Timing;
use App\Models\Properties\Meets\Track\Name;
use App\Models\Properties\Meets\Track\Venue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageTrackMeetsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    protected $host;
    protected $name;
    protected $season;
    protected $surface;
    protected $timing;
    protected $venue;
    protected $attributes;
    protected $newAttributes;
    protected $meet;

    public function setUp(): void
    {
        parent::setUp();

        $this->host = factory(Host::class)->create();
        $this->name = factory(Name::class)->create();
        $this->season = factory(Season::class)->create(['name' => 'Outdoor Track']);
        $this->surface = factory(TrackSurface::class)->create();
        $this->timing = factory(Timing::class)->create();
        $this->venue = factory(Venue::class)->create(['track_surface_id' => $this->surface->id]);

        $this->attributes = [
            'host_id' => $this->host->id,
            'meet_date' => '2020-10-10',
            'season_id' => $this->season->id,
            'timing_method_id' => $this->timing->id,
            'track_meet_name_id' => $this->name->id,
            'track_venue_id' => $this->venue->id
        ];

        $this->newAttributes = [
            'host_id' => $this->host->id,
            'meet_date' => '2020-06-25',
            'season_id' => $this->season->id,
            'timing_method_id' => $this->timing->id,
            'track_meet_name_id' => $this->name->id,
            'track_venue_id' => $this->venue->id
        ];
    }

    /** @test */
    public function an_admin_can_create_a_track_meet()
    {
        $this->signInAdmin();

        $this->post('/api/track/meets', $this->attributes)->assertStatus(201);

        $this->assertDatabaseHas('track_meets', $this->attributes);
    }

    /** @test */
    public function a_coach_can_create_a_track_meet()
    {
        $this->signInCoach();

        $this->post('/api/track/meets', $this->attributes)->assertStatus(201);

        $this->assertDatabaseHas('track_meets', $this->attributes);
    }

    /** @test */
    public function an_athlete_cannot_create_a_track_meet()
    {
        $this->signInAthlete();

        $this->post('/api/track/meets', $this->attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_track_meet()
    {
        $this->signInViewer();

        $this->post('/api/track/meets', $this->attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_track_meet()
    {
        $this->post('/api/track/meets', $this->attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_track_meet()
    {
        $this->signInAdmin();

        $meet = factory(TrackMeet::class)->create($this->attributes);

        $this->patch('/api/track/meets/'. $meet->id, $this->newAttributes)
            ->assertStatus(200);

        $this->assertDatabaseHas('track_meets', $this->newAttributes);
    }

    /** @test */
    public function a_coach_can_update_a_track_meet()
    {
        $this->signInCoach();

        $meet = factory(TrackMeet::class)->create($this->attributes);

        $this->patch('/api/track/meets/'. $meet->id, $this->newAttributes)
            ->assertStatus(200);

        $this->assertDatabaseHas('track_meets', $this->newAttributes);
    }

    /** @test */
    public function an_athlete_cannot_update_a_track_meet()
    {
        $this->signInAthlete();

        $meet = factory(TrackMeet::class)->create($this->attributes);

        $this->patch('/api/track/meets/'. $meet->id, $this->newAttributes)
            ->assertRedirect('/');

        $this->assertDatabaseHas('track_meets', $this->attributes);
    }

    /** @test */
    public function a_viewer_cannot_update_a_track_meet()
    {
        $this->signInViewer();

        $meet = factory(TrackMeet::class)->create($this->attributes);

        $this->patch('/api/track/meets/'. $meet->id, $this->newAttributes)
            ->assertRedirect('/');

        $this->assertDatabaseHas('track_meets', $this->attributes);
    }

    /** @test */
    public function a_guest_cannot_update_a_track_meet()
    {
        $meet = factory(TrackMeet::class)->create($this->attributes);

        $this->patch('/api/track/meets/'. $meet->id, $this->newAttributes)
            ->assertRedirect('/');

        $this->assertDatabaseHas('track_meets', $this->attributes);
    }
}
