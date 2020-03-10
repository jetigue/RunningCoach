<?php

namespace Tests\Feature;

use App\Models\Properties\General\Season;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageSeasonsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_season()
    {
        $this->signInAdmin();

        $attributes = ['name' => 'Cross Country'];

        $this->post('/api/seasons', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('seasons', $attributes);

        $this->get('/seasons')->assertSee($attributes['name']);
    }

    /** @test */
    public function a_season_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(Season::class)->raw(['name' => '']);

        $this->post('api/seasons', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_coach_cannot_create_a_season()
    {
        $this->signInCoach();

        $attributes = ['name' => 'Cross Country'];

        $this->post('/api/seasons', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_a_season()
    {
        $this->signInAthlete();

        $attributes = ['name' => 'Cross Country'];

        $this->post('/api/seasons', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_season()
    {
        $this->signInViewer();

        $attributes = ['name' => 'Cross Country'];

        $this->post('/api/seasons', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_season()
    {
        $attributes = ['name' => 'Cross Country'];

        $this->post('/api/seasons', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_view_seasons()
    {
        $this->signInAdmin();

        $this->get('/seasons')->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_seasons()
    {
        $this->signInCoach();

        $this->get('/seasons')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_seasons()
    {
        $this->signInAthlete();

        $this->get('/seasons')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_seasons()
    {
        $this->signInViewer();

        $this->get('/seasons')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_seasons()
    {
        $this->get('/seasons')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_season()
    {
        $this->signInAdmin();

        $season = factory(Season::class)->create(['name' => 'Original Season']);

        $this->patch('api/seasons/'.$season->slug, ['name' => 'Changed Season'])
            ->assertStatus(200);

        $this->assertDatabaseHas('seasons', ['name' => 'Changed Season']);
    }

    /** @test */
    public function a_coach_cannot_update_a_season()
    {
        $this->signInCoach();

        $season = factory(Season::class)->create(['name' => 'Original Season']);

        $this->patch('api/seasons/'.$season->slug, ['name' => 'Changed Season'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('seasons', ['name' => 'Original Season']);
    }

    /** @test */
    public function an_athlete_cannot_update_a_season()
    {
        $this->signInAthlete();

        $season = factory(Season::class)->create(['name' => 'Original Season']);

        $this->patch('api/seasons/'.$season->slug, ['name' => 'Changed Season'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('seasons', ['name' => 'Original Season']);
    }

    /** @test */
    public function a_viewer_cannot_update_a_season()
    {
        $this->signInViewer();

        $season = factory(Season::class)->create(['name' => 'Original Season']);

        $this->patch('api/seasons/'.$season->slug, ['name' => 'Changed Season'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('seasons', ['name' => 'Original Season']);
    }

    /** @test */
    public function a_guest_cannot_update_a_season()
    {
        $season = factory(Season::class)->create(['name' => 'Original Season']);

        $this->patch('api/seasons/'.$season->slug, ['name' => 'Changed Season'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('seasons', ['name' => 'Original Season']);
    }
}
