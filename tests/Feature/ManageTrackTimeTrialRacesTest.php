<?php

namespace Tests\Feature;

use App\Models\Properties\General\TrackSurface;
use App\Models\Properties\Meets\Timing;
use App\Models\Properties\Meets\Track\Venue;
use App\Models\Properties\Races\Gender;
use App\Models\Properties\Races\Track\Event;
use App\Models\TimeTrials\Track\Race;
use App\Models\TimeTrials\Track\TimeTrial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageTrackTimeTrialRacesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_time_trial_race()
    {
        $this->signInAdmin();
        $this->withExceptionHandling();

        $surface = factory(TrackSurface::class)->create();
        $venue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $timing = factory(Timing::class)->create();
        $timeTrial = factory(TimeTrial::class)->create([
            'track_venue_id' => $venue->id,
            'timing_method_id' => $timing->id,
        ]);
        $gender = factory(Gender::class)->create();
        $event = factory(Event::class)->create();

        $attributes = [
            'track_time_trial_id' => $timeTrial->id,
            'gender_id' => $gender->id,
            'track_event_id' => $event->id,
            'notes' => $this->faker->sentence,
        ];

        $this->post('/api/track/time-trials/1/races', $attributes)->assertStatus(201);

//        $this->assertDatabaseHas('track_time_trial_races', $attributes);
    }

    /** @test */
    public function a_coach_can_create_a_time_trial_race()
    {
        $this->signInCoach();

        $surface = factory(TrackSurface::class)->create();
        $venue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $timing = factory(Timing::class)->create();
        $timeTrial = factory(TimeTrial::class)->create([
            'track_venue_id' => $venue->id,
            'timing_method_id' => $timing->id,
        ]);
        $gender = factory(Gender::class)->create();
        $event = factory(Event::class)->create();

        $attributes = [
            'track_time_trial_id' => $timeTrial->id,
            'gender_id' => $gender->id,
            'track_event_id' => $event->id,
            'notes' => $this->faker->sentence,
        ];

        $this->post('/api/track/time-trials/1/races', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('track_time_trial_races', $attributes);
    }

    /** @test */
    public function an_athlete_cannot_create_a_time_trial_race()
    {
        $this->signInAthlete();

        $surface = factory(TrackSurface::class)->create();
        $venue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $timing = factory(Timing::class)->create();
        $timeTrial = factory(TimeTrial::class)->create([
            'track_venue_id' => $venue->id,
            'timing_method_id' => $timing->id,
        ]);
        $gender = factory(Gender::class)->create();
        $event = factory(Event::class)->create();

        $attributes = [
            'track_time_trial_id' => $timeTrial->id,
            'gender_id' => $gender->id,
            'track_event_id' => $event->id,
            'notes' => $this->faker->sentence,
        ];

        $this->post('/api/track/time-trials/1/races', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_time_trial_race()
    {
        $this->signInViewer();

        $surface = factory(TrackSurface::class)->create();
        $venue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $timing = factory(Timing::class)->create();
        $timeTrial = factory(TimeTrial::class)->create([
            'track_venue_id' => $venue->id,
            'timing_method_id' => $timing->id,
        ]);
        $gender = factory(Gender::class)->create();
        $event = factory(Event::class)->create();

        $attributes = [
            'track_time_trial_id' => $timeTrial->id,
            'gender_id' => $gender->id,
            'track_event_id' => $event->id,
            'notes' => $this->faker->sentence,
        ];

        $this->post('/api/track/time-trials/1/races', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_time_trial_race()
    {
        $surface = factory(TrackSurface::class)->create();
        $venue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
        $timing = factory(Timing::class)->create();
        $timeTrial = factory(TimeTrial::class)->create([
            'track_venue_id' => $venue->id,
            'timing_method_id' => $timing->id,
        ]);
        $gender = factory(Gender::class)->create();
        $event = factory(Event::class)->create();

        $attributes = [
            'track_time_trial_id' => $timeTrial->id,
            'gender_id' => $gender->id,
            'track_event_id' => $event->id,
            'notes' => $this->faker->sentence,
        ];

        $this->post('/api/track/time-trials/1/races', $attributes)->assertRedirect('/');
    }

//    /** @test */
//    public function an_admin_can_update_a_time_trial_race()
//    {
//        $this->signInAdmin();
//
//        $surface = factory(TrackSurface::class)->create();
//        $venue = factory(Venue::class)->create(['track_surface_id' => $surface->id]);
//        $timing = factory(Timing::class)->create();
//
//        $oldTimeTrial = factory(TimeTrial::class)->create([
//            'name' => 'Old Time Trial',
//            'trial_date' => '2020-01-01',
//            'track_venue_id' => $venue->id,
//            'timing_method_id' => $timing->id
//        ]);
//        $newTimeTrial = factory(TimeTrial::class)->create([
//            'name' => 'New Time Trial',
//            'trial_date' => '2020-01-01',
//            'track_venue_id' => $venue->id,
//            'timing_method_id' => $timing->id
//        ]);
//        $oldGender = factory(Gender::class)->create();
//        $newGender = factory(Gender::class)->create();
//        $oldEvent = factory(Event::class)->create();
//        $newEvent = factory(Event::class)->create();
//
//        $race = factory(Race::class, [
//            'track_time_trial_id' => $oldTimeTrial->id,
//            'gender_id' => $oldGender->id,
//            'track_event_id' => $oldEvent->id,
//            'notes' => $this->faker->sentence
//        ]);
//
//        $this->patch('/api/track/time-trials/1/races/' . $race->id, [
//            'gender_id' => $newGender->id,
//            'track_event_id' => $newEvent->id,
//            'notes' => $this->faker->sentence
//        ])
//            ->assertStatus(200);

//        $this->assertDatabaseHas('track_time_trial_races', [
//            'track_time_trial_id' => $newTimeTrial->id,
//            'gender_id' => $newGender->id,
//            'track_event_id' => $newEvent->id,
//        ]);
//    }
}
