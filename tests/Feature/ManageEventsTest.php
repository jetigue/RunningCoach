<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Properties\Races\TrackEvent;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Throwable;

class ManageEventsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_an_event()
    {
        $this->withOutExceptionHandling();

        $this->signInAdmin();

        $name = '3200m';
        $attributes = [
            'name' => $name,
            'meters' => 3200
        ];

        $this->post('/api/events', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('events', $attributes);

        $this->get('/events')
            ->assertSee($attributes['name'])
            ->assertSee($attributes['meters']);
    }

    /** @test */
    public function a_coach_cannot_create_events()
    {
        $this->signInCoach();

        $name = '3200m';
        $attributes = [
            'name' => $name,
            'meters' => 3200
        ];

        $this->post('/api/events', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_events()
    {
        $this->signInAthlete();

        $name = '3200m';
        $attributes = [
            'name' => $name,
            'meters' => 3200
        ];

        $this->post('/api/events', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_events()
    {
        $this->signInViewer();

        $name = '3200m';
        $attributes = [
            'name' => $name,
            'meters' => 3200
        ];

        $this->post('/api/events', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_events()
    {
        $name = '3200m';
        $attributes = [
            'name' => $name,
            'meters' => 3200
        ];

        $this->post('/api/events', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_event_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(TrackEvent::class)->raw(['name' => '']);

        $this->post('api/events', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function an_event_requires_a_distance_in_meters()
    {
        $this->signInAdmin();

        $attributes = factory(TrackEvent::class)->raw(['meters' => '']);

        $this->post('api/events', $attributes)->assertSessionHasErrors('meters');
    }

    /** @test */
    public function an_admin_can_view_events()
    {
        $this->signInAdmin();

        $this->get('/events')
            ->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_events()
    {
        $this->signInCoach();

        $this->get('/events')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_events()
    {
        $this->signInAthlete();

        $this->get('/events')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_events()
    {
        $this->signInViewer();

        $this->get('/events')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_events()
    {
        $this->get('/events')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_event()
    {
        $this->signInAdmin();

        $event = factory(TrackEvent::class)->create([
            'name' => 'Original TrackEvent',
            'meters' => 800
        ]);

        $this->patch('api/events/' . $event->slug, [
            'name' => 'Changed TrackEvent',
            'meters' => 1000
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('events', [
            'name' => 'Changed TrackEvent',
            'meters' => 1000
        ]);
    }

    /** @test */
    public function a_coach_cannot_update_a_event()
    {
        $this->signInCoach();

        $event = factory(TrackEvent::class)->create([
            'name' => 'Original TrackEvent',
            'meters' => 800
        ]);

        $this->patch('api/events/' . $event->slug, [
            'name' => 'Changed TrackEvent',
            'meters' => '1000'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('events', [
            'name' => 'Original TrackEvent',
            'meters' => 800
        ]);
    }

    /** @test */
    public function an_athlete_cannot_update_a_event()
    {
        $this->signInAthlete();

        $event = factory(TrackEvent::class)->create([
            'name' => 'Original TrackEvent',
            'meters' => 800
        ]);

        $this->patch('api/events/' . $event->slug, [
            'name' => 'Changed TrackEvent',
            'meters' => '1000'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('events', [
            'name' => 'Original TrackEvent',
            'meters' => 800
        ]);
    }

    /** @test */
    public function a_viewer_cannot_update_a_event()
    {
        $this->signInViewer();

        $event = factory(TrackEvent::class)->create([
            'name' => 'Original TrackEvent',
            'meters' => 800
        ]);

        $this->patch('api/events/' . $event->slug, [
            'name' => 'Changed TrackEvent',
            'meters' => '1000'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('events', [
            'name' => 'Original TrackEvent',
            'meters' => 800
        ]);
    }

    /** @test */
    public function a_guest_cannot_update_a_season()
    {
        $event = factory(TrackEvent::class)->create([
            'name' => 'Original TrackEvent',
            'meters' => 800
        ]);

        $this->patch('api/events/' . $event->slug, [
            'name' => 'Changed TrackEvent',
            'meters' => '1000'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('events', [
            'name' => 'Original TrackEvent',
            'meters' => 800
        ]);
    }
}
