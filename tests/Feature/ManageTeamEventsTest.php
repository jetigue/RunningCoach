<?php

namespace Tests\Feature;

use App\Models\Team\TeamEvent;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageTeamEventsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_team_event()
    {
        $this->signInAdmin();

        $attributes = [
            'name'       => $this->faker->sentence($nbWords = 3, $variableBbWords = true),
            'event_date' => $this->faker->date($format = 'Y-m-d'),
            'event_time' => $this->faker->time($format = 'H:i:s'),
            'location'   => $this->faker->city . ', ' . 'GA',
            'details'    => $this->faker->sentence($nbWords = 5, $variableBbWords = true),
        ];

        $this->post('/api/teamEvents', $attributes);

        $this->assertDatabaseHas('team_events', $attributes);

        $this->get('/team-events')
            ->assertSee($attributes['name'])
            ->assertSee($attributes['event_date']);
    }

    /** @test */
    public function a_coach_can_create_a_team_event()
    {
        $this->signInCoach();

        $attributes = [
            'name'       => $this->faker->sentence($nbWords = 3, $variableBbWords = true),
            'event_date' => $this->faker->date($format = 'Y-m-d'),
            'event_time' => $this->faker->time($format = 'H:i:s'),
            'location'   => $this->faker->city . ', ' . 'GA',
            'details'    => $this->faker->sentence($nbWords = 5, $variableBbWords = true),
        ];

        $this->post('/api/teamEvents', $attributes);

        $this->assertDatabaseHas('team_events', $attributes);

        $this->get('/team-events')
            ->assertSee($attributes['name'])
            ->assertSee($attributes['event_date']);
    }

    /** @test */
    public function an_athlete_cannot_create_a_team_event()
    {
        $this->signInAthlete();

        $attributes = [
            'name'       => $this->faker->sentence($nbWords = 3, $variableBbWords = true),
            'event_date' => $this->faker->date($format = 'Y-m-d'),
            'event_time' => $this->faker->time($format = 'H:i:s'),
            'location'   => $this->faker->city . ', ' . 'GA',
            'details'    => $this->faker->sentence($nbWords = 5, $variableBbWords = true),
        ];

        $this->post('/api/teamEvents', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_team_event()
    {
        $this->signInViewer();

        $attributes = [
            'name'       => $this->faker->sentence($nbWords = 3, $variableBbWords = true),
            'event_date' => $this->faker->date($format = 'Y-m-d'),
            'event_time' => $this->faker->time($format = 'H:i:s'),
            'location'   => $this->faker->city . ', ' . 'GA',
            'details'    => $this->faker->sentence($nbWords = 5, $variableBbWords = true),
        ];

        $this->post('/api/teamEvents', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_team_event()
    {
        $attributes = [
            'name'       => $this->faker->sentence($nbWords = 3, $variableBbWords = true),
            'event_date' => $this->faker->date($format = 'Y-m-d'),
            'event_time' => $this->faker->time($format = 'H:i:s'),
            'location'   => $this->faker->city . ', ' . 'GA',
            'details'    => $this->faker->sentence($nbWords = 5, $variableBbWords = true),
        ];

        $this->post('/api/teamEvents', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_team_event_requires_a_title()
    {
        $this->signInAdmin();

        $attributes = factory(TeamEvent::class)->raw(['name' => '']);

        $this->post('api/teamEvents', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_team_event_requires_a_begin_date()
    {
        $this->signInAdmin();

        $attributes = factory(TeamEvent::class)->raw(['event_date' => '']);

        $this->post('api/teamEvents', $attributes)->assertSessionHasErrors('event_date');
    }

    /** @test */
    public function a_team_event_requires_a_begin_time()
    {
        $this->signInAdmin();

        $attributes = factory(TeamEvent::class)->raw(['event_time' => '']);

        $this->post('api/teamEvents', $attributes)->assertSessionHasErrors('event_time');
    }

    /** @test */
    public function a_team_event_requires_a_location()
    {
        $this->signInAdmin();

        $attributes = factory(TeamEvent::class)->raw(['location' => '']);

        $this->post('api/teamEvents', $attributes)->assertSessionHasErrors('location');
    }

    /** @test */
    public function an_admin_can_view_team_events()
    {
        $this->signInAdmin();

        $this->get('/teamEvents')->assertSee('name');
    }

    /** @test */
    public function a_coach_can_view_team_events()
    {
        $this->signInCoach();

        $this->get('/teamEvents')->assertSee('name');
    }

    /** @test */
    public function an_athlete_cannot_view_team_events()
    {
        $this->signInAthlete();

        $this->get('/team-events')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_team_events()
    {
        $this->signInViewer();

        $this->get('/team-events')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_team_events()
    {
        $this->get('/team-events')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_team_event()
    {
        $this->signInAdmin();

        $originalTeamEvent = [
            'id' => 1,
            'name' => 'Original TrackEvent Name',
            'event_date' => '1975-10-10',
            'event_time' => 'Original Time',
            'location' => 'Original Location',
            'details' => 'Original Details'
        ];

        $revisedTeamEvent = [
            'name' => 'Revised TrackEvent Name',
            'event_date' => '2020-10-10',
            'event_time' => 'Revised Time',
            'location' => 'Revised Location',
            'details' => 'Revised Details'
        ];

        $this->post('/api/teamEvents', $originalTeamEvent);

        $this->patch('api/teamEvents/' . 1, $revisedTeamEvent)
            ->assertStatus(200);

        $this->assertDatabaseHas('team_events', $revisedTeamEvent);
    }

    /** @test */
    public function a_coach_can_update_a_team_event()
    {
        $this->signInCoach();

        $originalTeamEvent = [
            'id' => 1,
            'name' => 'Original TrackEvent Name',
            'event_date' => '1975-10-10',
            'event_time' => 'Original Time',
            'location' => 'Original Location',
            'details' => 'Original Details'
        ];

        $revisedTeamEvent = [
            'name' => 'Revised TrackEvent Name',
            'event_date' => '2020-10-10',
            'event_time' => 'Revised Time',
            'location' => 'Revised Location',
            'details' => 'Revised Details'
        ];

        $this->post('/api/teamEvents', $originalTeamEvent);

        $this->patch('api/teamEvents/' . 1, $revisedTeamEvent)
            ->assertStatus(200);

        $this->assertDatabaseHas('team_events', $revisedTeamEvent);
    }

    /** @test */
    public function an_athlete_cannot_update_a_team_event()
    {
        $this->signInAthlete();

        factory(TeamEvent::class)->create([
            'id' => 1,
            'name' => 'Original TrackEvent Name',
            'event_date' => '1975-10-10',
            'event_time' => 'Original Time',
            'location' => 'Original Location',
            'details' => 'Original Details'
        ]);

        $revisedTeamEvent = [
            'name' => 'Revised TrackEvent Name',
            'event_date' => '2020-10-10',
            'event_time' => 'Revised Time',
            'location' => 'Revised Location',
            'details' => 'Revised Details'
        ];

        $this->patch('api/teamEvents/' . 1, $revisedTeamEvent)
            ->assertRedirect('/');

        $this->assertDatabaseHas('team_events', [
            'id' => 1,
            'name' => 'Original TrackEvent Name',
            'event_date' => '1975-10-10',
            'event_time' => 'Original Time',
            'location' => 'Original Location',
            'details' => 'Original Details'
        ]);
    }

    /** @test */
    public function a_viewer_cannot_update_a_team_event()
    {
        $this->signInViewer();

        factory(TeamEvent::class)->create([
            'id' => 1,
            'name' => 'Original TrackEvent Name',
            'event_date' => '1975-10-10',
            'event_time' => 'Original Time',
            'location' => 'Original Location',
            'details' => 'Original Details'
        ]);

        $revisedTeamEvent = [
            'name' => 'Revised TrackEvent Name',
            'event_date' => '2020-10-10',
            'event_time' => 'Revised Time',
            'location' => 'Revised Location',
            'details' => 'Revised Details'
        ];

        $this->patch('api/teamEvents/' . 1, $revisedTeamEvent)
            ->assertRedirect('/');

        $this->assertDatabaseHas('team_events', [
            'id' => 1,
            'name' => 'Original TrackEvent Name',
            'event_date' => '1975-10-10',
            'event_time' => 'Original Time',
            'location' => 'Original Location',
            'details' => 'Original Details'
        ]);
    }

    /** @test */
    public function a_guest_cannot_update_a_team_event()
    {
        factory(TeamEvent::class)->create([
            'id' => 1,
            'name' => 'Original TrackEvent Name',
            'event_date' => '1975-10-10',
            'event_time' => 'Original Time',
            'location' => 'Original Location',
            'details' => 'Original Details'
        ]);

        $revisedTeamEvent = [
            'name' => 'Revised TrackEvent Name',
            'event_date' => '2020-10-10',
            'event_time' => 'Revised Time',
            'location' => 'Revised Location',
            'details' => 'Revised Details'
        ];

        $this->patch('api/teamEvents/' . 1, $revisedTeamEvent)
            ->assertRedirect('/');

        $this->assertDatabaseHas('team_events', [
            'id' => 1,
            'name' => 'Original TrackEvent Name',
            'event_date' => '1975-10-10',
            'event_time' => 'Original Time',
            'location' => 'Original Location',
            'details' => 'Original Details'
        ]);
    }

}
