<?php

namespace Tests\Feature;

use App\Models\Properties\Races\CrossCountry\Event;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Throwable;

class ManageTCrossCountryEventsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_cross_country_event()
    {
        $this->withOutExceptionHandling();

        $this->signInAdmin();

        $name = '3200m';
        $attributes = [
            'name' => $name,
            'meters' => 3200
        ];

        $this->post('/api/cross-country/events', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('cross_country_events', $attributes);

        $this->get('/cross-country/events')
            ->assertSee($attributes['name'])
            ->assertSee($attributes['meters']);
    }

    /** @test */
    public function a_coach_cannot_create_cross_country_events()
    {
        $this->signInCoach();

        $name = '3200m';
        $attributes = [
            'name' => $name,
            'meters' => 3200
        ];

        $this->post('/api/cross-country/events', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_cross_country_events()
    {
        $this->signInAthlete();

        $name = '3200m';
        $attributes = [
            'name' => $name,
            'meters' => 3200
        ];

        $this->post('/api/cross-country/events', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_cross_country_events()
    {
        $this->signInViewer();

        $name = '3200m';
        $attributes = [
            'name' => $name,
            'meters' => 3200
        ];

        $this->post('/api/cross-country/events', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_cross_country_events()
    {
        $name = '3200m';
        $attributes = [
            'name' => $name,
            'meters' => 3200
        ];

        $this->post('/api/cross-country/events', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_cross_country_event_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(Event::class)->raw(['name' => '']);

        $this->post('api/cross-country/events', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_cross_country_event_requires_a_distance_in_meters()
    {
        $this->signInAdmin();

        $attributes = factory(Event::class)->raw(['meters' => '']);

        $this->post('api/cross-country/events', $attributes)->assertSessionHasErrors('meters');
    }

    /** @test */
    public function an_admin_can_view_cross_country_events()
    {
        $this->signInAdmin();

        $this->get('/cross-country-events')
            ->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_cross_country_events()
    {
        $this->signInCoach();

        $this->get('/cross-country/events')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_track_events()
    {
        $this->signInAthlete();

        $this->get('/cross-country/events')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_track_events()
    {
        $this->signInViewer();

        $this->get('/cross-country/events')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_events()
    {
        $this->get('/cross-country/events')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_track_event()
    {
        $this->signInAdmin();

        $event = factory(Event::class)->create([
            'name' => 'Original CrossCountryEvent',
            'meters' => 800
        ]);

        $this->patch('api/cross-country/events/' . $event->slug, [
            'name' => 'Changed CrossCountryEvent',
            'meters' => 1000
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('cross_country_events', [
            'name' => 'Changed CrossCountryEvent',
            'meters' => 1000
        ]);
    }

    /** @test */
    public function a_coach_cannot_update_a_track_event()
    {
        $this->signInCoach();

        $event = factory(Event::class)->create([
            'name' => 'Original CrossCountryEvent',
            'meters' => 800
        ]);

        $this->patch('api/cross-country/events/' . $event->slug, [
            'name' => 'Changed CrossCountryEvent',
            'meters' => '1000'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('cross_country_events', [
            'name' => 'Original CrossCountryEvent',
            'meters' => 800
        ]);
    }

    /** @test */
    public function an_athlete_cannot_update_a_track_event()
    {
        $this->signInAthlete();

        $event = factory(Event::class)->create([
            'name' => 'Original CrossCountryEvent',
            'meters' => 800
        ]);

        $this->patch('api/cross-country/events/' . $event->slug, [
            'name' => 'Changed CrossCountryEvent',
            'meters' => '1000'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('cross_country_events', [
            'name' => 'Original CrossCountryEvent',
            'meters' => 800
        ]);
    }

    /** @test */
    public function a_viewer_cannot_update_a_track_event()
    {
        $this->signInViewer();

        $event = factory(Event::class)->create([
            'name' => 'Original CrossCountryEvent',
            'meters' => 800
        ]);

        $this->patch('api/cross-country/events/' . $event->slug, [
            'name' => 'Changed CrossCountryEvent',
            'meters' => '1000'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('cross_country_events', [
            'name' => 'Original CrossCountryEvent',
            'meters' => 800
        ]);
    }

    /** @test */
    public function a_guest_cannot_update_a_track_event()
    {
        $event = factory(Event::class)->create([
            'name' => 'Original CrossCountryEvent',
            'meters' => 800
        ]);

        $this->patch('api/cross-country/events/' . $event->slug, [
            'name' => 'Changed CrossCountryEvent',
            'meters' => '1000'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('cross_country_events', [
            'name' => 'Original CrossCountryEvent',
            'meters' => 800
        ]);
    }
}
