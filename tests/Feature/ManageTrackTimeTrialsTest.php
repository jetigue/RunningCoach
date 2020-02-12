<?php

namespace Tests\Feature;

use App\Models\Properties\General\TrackSurface;
use App\Models\Properties\Meets\Timing;
use App\Models\Properties\Meets\Track\Venue;
use App\Models\TimeTrials\Track\TimeTrial;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageTrackTimeTrialsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_time_trial()
    {
        $this->signInAdmin();

        $surface = factory(TrackSurface::class)->create();
        $venue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $timing = factory(Timing::class)->create();

        $attributes = [
            'name' => 'Time Trial #1',
            'trial_date' => $this->faker->date($format = 'Y-m-d'),
            'track_venue_id' => $venue->id,
            'timing_method_id' => $timing->id,
        ];

        $this->post('/api/track/time-trials', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('track_time_trials', $attributes);
    }

    /** @test */
    public function a_coach_can_create_a_time_trial()
    {
        $this->signInCoach();

        $surface = factory(TrackSurface::class)->create();
        $venue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $timing = factory(Timing::class)->create();

        $attributes = [
            'name' => 'Time Trial #1',
            'trial_date' => $this->faker->date($format = 'Y-m-d'),
            'track_venue_id' => $venue->id,
            'timing_method_id' => $timing->id,
        ];

        $this->post('/api/track/time-trials', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('track_time_trials', $attributes);
    }

    /** @test */
    public function an_athlete_cannot_create_a_time_trial()
    {
        $this->signInAthlete();

        $surface = factory(TrackSurface::class)->create();
        $venue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $timing = factory(Timing::class)->create();

        $attributes = [
            'name' => 'Time Trial #1',
            'trial_date' => $this->faker->date($format = 'Y-m-d'),
            'track_venue_id' => $venue->id,
            'timing_method_id' => $timing->id,
        ];

        $this->post('/api/track/time-trials', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_time_trial()
    {
        $this->signInAthlete();

        $surface = factory(TrackSurface::class)->create();
        $venue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $timing = factory(Timing::class)->create();

        $attributes = [
            'name' => 'Time Trial #1',
            'trial_date' => $this->faker->date($format = 'Y-m-d'),
            'track_venue_id' => $venue->id,
            'timing_method_id' => $timing->id,
        ];

        $this->post('/api/track/time-trials', $attributes)->assertRedirect('/');
    }

        /** @test */
    public function a_guest_cannot_create_a_time_trial()
    {
        $this->signInAthlete();

        $surface = factory(TrackSurface::class)->create();
        $venue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $timing = factory(Timing::class)->create();

        $attributes = [
            'name' => 'Time Trial #1',
            'trial_date' => $this->faker->date($format = 'Y-m-d'),
            'track_venue_id' => $venue->id,
            'timing_method_id' => $timing->id,
        ];

        $this->post('/api/track/time-trials', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_time_trial_requires_a_name()
    {
        $this->signInAdmin();

        $surface = factory(TrackSurface::class)->create();
        $venue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $timing = factory(Timing::class)->create();
        $attributes = [
            'name' => '',
            'trial_date' => $this->faker->date($format = 'Y-m-d'),
            'track_venue_id' => $venue->id,
            'timing_method_id' => $timing->id,
        ];

        $this->post('api/track/time-trials', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_time_trial_requires_a_trial_date()
    {
        $this->signInAdmin();

        $surface = factory(TrackSurface::class)->create();
        $venue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $timing = factory(Timing::class)->create();
        $attributes = [
            'name' => 'Test Time Trial',
            'trial_date' => '',
            'track_venue_id' => $venue->id,
            'timing_method_id' => $timing->id,
        ];

        $this->post('api/track/time-trials', $attributes)->assertSessionHasErrors('trial_date');
    }

    /** @test */
    public function a_time_trial_requires_a_track_venue_id()
    {
        $this->signInAdmin();

        $surface = factory(TrackSurface::class)->create();
        $venue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $timing = factory(Timing::class)->create();
        $attributes = [
            'name' => 'Test Time Trial',
            'trial_date' => $this->faker->date($format = 'Y-m-d'),
            'track_venue_id' => '',
            'timing_method_id' => $timing->id,
        ];

        $this->post('api/track/time-trials', $attributes)->assertSessionHasErrors('track_venue_id');
    }

    /** @test */
    public function a_time_trial_requires_a_timing_method_id()
    {
        $this->signInAdmin();

        $surface = factory(TrackSurface::class)->create();
        $venue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $timing = factory(Timing::class)->create();

        $attributes = [
            'name' => 'Test Time Trial',
            'trial_date' => $this->faker->date($format = 'Y-m-d'),
            'track_venue_id' => $venue->id,
            'timing_method_id' => '',
        ];

        $this->post('api/track/time-trials', $attributes)->assertSessionHasErrors('timing_method_id');
    }

    /** @test */
    public function an_admin_can_update_a_time_trial()
    {
        $this->signInAdmin();

        $surface = factory(TrackSurface::class)->create();
        $oldVenue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $newVenue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $oldTiming = factory(Timing::class)->create();
        $newTiming = factory(Timing::class)->create();

        $timeTrial = factory(TimeTrial::class)->create([
            'name' => 'Original Time Trial Name',
            'trial_date' => '2020-01-01',
            'track_venue_id' => $oldVenue->id,
            'timing_method_id' => $oldTiming->id,
        ]);

        $this->patch('/api/track/time-trials/' . $timeTrial->id, [
            'name' => 'New Time Trial Name',
            'trial_date' => '2020-10-10',
            'track_venue_id' => $newVenue->id,
            'timing_method_id' => $newTiming->id,
        ])->assertStatus(200);

        $this->assertDatabaseHas('track_time_trials', [
            'name' => 'New Time Trial Name',
            'trial_date' => '2020-10-10',
            'track_venue_id' => $newVenue->id,
            'timing_method_id' => $newTiming->id,
        ]);
    }

    /** @test */
    public function a_coach_can_update_a_time_trial()
    {
        $this->signInCoach();

        $surface = factory(TrackSurface::class)->create();
        $oldVenue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $newVenue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $oldTiming = factory(Timing::class)->create();
        $newTiming = factory(Timing::class)->create();

        $timeTrial = factory(TimeTrial::class)->create([
            'name' => 'Original Time Trial Name',
            'trial_date' => '2020-01-01',
            'track_venue_id' => $oldVenue->id,
            'timing_method_id' => $oldTiming->id,
        ]);

        $this->patch('/api/track/time-trials/' . $timeTrial->id, [
            'name' => 'New Time Trial Name',
            'trial_date' => '2020-10-10',
            'track_venue_id' => $newVenue->id,
            'timing_method_id' => $newTiming->id,
        ])->assertStatus(200);

        $this->assertDatabaseHas('track_time_trials', [
            'name' => 'New Time Trial Name',
            'trial_date' => '2020-10-10',
            'track_venue_id' => $newVenue->id,
            'timing_method_id' => $newTiming->id,
        ]);
    }

    /** @test */
    public function an_athlete_cannot_update_a_time_trial()
    {
        $this->signInAthlete();

        $surface = factory(TrackSurface::class)->create();
        $oldVenue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $newVenue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $oldTiming = factory(Timing::class)->create();
        $newTiming = factory(Timing::class)->create();

        $timeTrial = factory(TimeTrial::class)->create([
            'name' => 'Original Time Trial Name',
            'trial_date' => '2020-01-01',
            'track_venue_id' => $oldVenue->id,
            'timing_method_id' => $oldTiming->id,
        ]);

        $this->patch('/api/track/time-trials/' . $timeTrial->id, [
            'name' => 'New Time Trial Name',
            'trial_date' => '2020-10-10',
            'track_venue_id' => $newVenue->id,
            'timing_method_id' => $newTiming->id
        ])
            ->assertRedirect('/');;

        $this->assertDatabaseHas('track_time_trials', [
            'name' => 'Original Time Trial Name',
            'trial_date' => '2020-01-01',
            'track_venue_id' => $oldVenue->id,
            'timing_method_id' => $oldTiming->id,
        ]);
    }

        /** @test */
    public function an_viewer_cannot_update_a_time_trial()
    {
        $this->signInViewer();

        $surface = factory(TrackSurface::class)->create();
        $oldVenue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $newVenue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $oldTiming = factory(Timing::class)->create();
        $newTiming = factory(Timing::class)->create();

        $timeTrial = factory(TimeTrial::class)->create([
            'name' => 'Original Time Trial Name',
            'trial_date' => '2020-01-01',
            'track_venue_id' => $oldVenue->id,
            'timing_method_id' => $oldTiming->id,
        ]);

        $this->patch('/api/track/time-trials/' . $timeTrial->id, [
            'name' => 'New Time Trial Name',
            'trial_date' => '2020-10-10',
            'track_venue_id' => $newVenue->id,
            'timing_method_id' => $newTiming->id
        ])
            ->assertRedirect('/');;

        $this->assertDatabaseHas('track_time_trials', [
            'name' => 'Original Time Trial Name',
            'trial_date' => '2020-01-01',
            'track_venue_id' => $oldVenue->id,
            'timing_method_id' => $oldTiming->id,
        ]);
    }

        /** @test */
    public function a_guest_cannot_update_a_time_trial()
    {
        $surface = factory(TrackSurface::class)->create();
        $oldVenue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $newVenue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $oldTiming = factory(Timing::class)->create();
        $newTiming = factory(Timing::class)->create();

        $timeTrial = factory(TimeTrial::class)->create([
            'name' => 'Original Time Trial Name',
            'trial_date' => '2020-01-01',
            'track_venue_id' => $oldVenue->id,
            'timing_method_id' => $oldTiming->id,
        ]);

        $this->patch('/api/track/time-trials/' . $timeTrial->id, [
            'name' => 'New Time Trial Name',
            'trial_date' => '2020-10-10',
            'track_venue_id' => $newVenue->id,
            'timing_method_id' => $newTiming->id
        ])
            ->assertRedirect('/');;

        $this->assertDatabaseHas('track_time_trials', [
            'name' => 'Original Time Trial Name',
            'trial_date' => '2020-01-01',
            'track_venue_id' => $oldVenue->id,
            'timing_method_id' => $oldTiming->id,
        ]);
    }

    /** @test */
    public function an_admin_can_view_track_time_trials()
    {
        $this->signInAdmin();

        $this->get('/track/time-trials')
            ->assertSee('name');
    }

    /** @test */
    public function a_coach_can_view_track_time_trials()
    {
        $this->signInCoach();

        $this->get('/track/time-trials')
            ->assertSee('name');
    }

    /** @test */
    public function an_athlete_can_view_track_time_trials()
    {
        $this->signInAthlete();

        $this->get('/track/time-trials')
            ->assertSee('name');
    }

    /** @test */
    public function a_viewer_can_view_track_time_trials()
    {
        $this->signInViewer();

        $this->get('/track/time-trials')
            ->assertSee('name');
    }

    /** @test */
    public function a_guest_can_view_track_time_trials()
    {
        $this->get('/track/time-trials')
            ->assertSee('name');
    }
}
