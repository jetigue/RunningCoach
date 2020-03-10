<?php

namespace Tests\Feature;

use App\Models\Properties\Races\Track\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Throwable;

class ManageTrackEventsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_track_event()
    {
        $this->withOutExceptionHandling();

        $this->signInAdmin();

        $name = '3200m';
        $attributes = [
            'name' => $name,
            'meters' => 3200,
            'relay' => 0,
        ];

        $this->post('/api/track/events', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('track_events', $attributes);

        $this->get('/track/events')
            ->assertSee($attributes['name'])
            ->assertSee($attributes['meters']);
    }

    /** @test */
    public function a_coach_cannot_create_track_events()
    {
        $this->signInCoach();

        $name = '3200m';
        $attributes = [
            'name' => $name,
            'meters' => 3200,
            'relay' => 0,
        ];

        $this->post('/api/track/events', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_track_events()
    {
        $this->signInAthlete();

        $name = '3200m';
        $attributes = [
            'name' => $name,
            'meters' => 3200,
            'relay' => 0,
        ];

        $this->post('/api/track/events', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_track_events()
    {
        $this->signInViewer();

        $name = '3200m';
        $attributes = [
            'name' => $name,
            'meters' => 3200,
            'relay' => 0,
        ];

        $this->post('/api/track/events', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_track_events()
    {
        $name = '3200m';
        $attributes = [
            'name' => $name,
            'meters' => 3200,
            'relay' => 0,
        ];

        $this->post('/api/track/events', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_track_event_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(Event::class)->raw(['name' => '']);

        $this->post('api/track/events', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_track_event_requires_a_distance_in_meters()
    {
        $this->signInAdmin();

        $attributes = factory(Event::class)->raw(['meters' => '']);

        $this->post('api/track/events', $attributes)->assertSessionHasErrors('meters');
    }

    /** @test */
    public function an_admin_can_view_track_events()
    {
        $this->signInAdmin();

        $this->get('/track/events')
            ->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_track_events()
    {
        $this->signInCoach();

        $this->get('/track/events')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_track_events()
    {
        $this->signInAthlete();

        $this->get('/track/events')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_track_events()
    {
        $this->signInViewer();

        $this->get('/track/events')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_events()
    {
        $this->get('/track/events')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_track_event()
    {
        $this->signInAdmin();

        $event = factory(Event::class)->create([
            'name' => 'Original TrackEvent',
            'meters' => 800,
            'relay' => 0,
        ]);

        $this->patch('api/track/events/'.$event->slug, [
            'name' => 'Changed TrackEvent',
            'meters' => 1000,
            'relay' => 0,
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('track_events', [
            'name' => 'Changed TrackEvent',
            'meters' => 1000,
            'relay' => 0,
        ]);
    }

    /** @test */
    public function a_coach_cannot_update_a_track_event()
    {
        $this->signInCoach();

        $event = factory(Event::class)->create([
            'name' => 'Original TrackEvent',
            'meters' => 800,
            'relay' => 0,
        ]);

        $this->patch('api/track/events/'.$event->slug, [
            'name' => 'Changed TrackEvent',
            'meters' => '1000',
            'relay' => 0,
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('track_events', [
            'name' => 'Original TrackEvent',
            'meters' => 800,
            'relay' => 0,
        ]);
    }

    /** @test */
    public function an_athlete_cannot_update_a_track_event()
    {
        $this->signInAthlete();

        $event = factory(Event::class)->create([
            'name' => 'Original TrackEvent',
            'meters' => 800,
            'relay' => 0,
        ]);

        $this->patch('api/track/events/'.$event->slug, [
            'name' => 'Changed TrackEvent',
            'meters' => '1000',
            'relay' => 0,
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('track_events', [
            'name' => 'Original TrackEvent',
            'meters' => 800,
            'relay' => 0,
        ]);
    }

    /** @test */
    public function a_viewer_cannot_update_a_track_event()
    {
        $this->signInViewer();

        $event = factory(Event::class)->create([
            'name' => 'Original TrackEvent',
            'meters' => 800,
            'relay' => 0,
        ]);

        $this->patch('api/track/events/'.$event->slug, [
            'name' => 'Changed TrackEvent',
            'meters' => '1000',
            'relay' => 0,
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('track_events', [
            'name' => 'Original TrackEvent',
            'meters' => 800,
            'relay' => 0,
        ]);
    }

    /** @test */
    public function a_guest_cannot_update_a_track_event()
    {
        $event = factory(Event::class)->create([
            'name' => 'Original TrackEvent',
            'meters' => 800,
            'relay' => 0,
        ]);

        $this->patch('api/track/events/'.$event->slug, [
            'name' => 'Changed TrackEvent',
            'meters' => '1000',
            'relay' => 0,
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('track_events', [
            'name' => 'Original TrackEvent',
            'meters' => 800,
            'relay' => 0,
        ]);
    }
}
