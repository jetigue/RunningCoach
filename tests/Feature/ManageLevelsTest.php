<?php

namespace Tests\Feature;

use App\Models\Properties\Races\Level;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageLevelsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_level()
    {
        $this->signInAdmin();

        $attributes = ['name' => 'Varsity'];

        $this->post('/api/levels', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('levels', $attributes);

        $this->get('/levels')
            ->assertSee($attributes['name']);
    }

    /** @test */
    public function a_coach_cannot_create_levels()
    {
        $this->signInCoach();

        $attributes = ['name' => 'Varsity'];

        $this->post('/api/levels', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_levels()
    {
        $this->signInAthlete();

        $attributes = ['name' => 'Varsity'];

        $this->post('/api/levels', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_levels()
    {
        $this->signInViewer();

        $attributes = ['name' => 'Varsity'];

        $this->post('/api/levels', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_levels()
    {
        $attributes = ['name' => 'Varsity'];

        $this->post('/api/levels', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_level_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(Level::class)->raw(['name' => '']);

        $this->post('api/levels', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function an_admin_can_view_levels()
    {
        $this->signInAdmin();

        $this->get('/levels')->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_levels()
    {
        $this->signInCoach();

        $this->get('/levels')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_levels()
    {
        $this->signInAthlete();

        $this->get('/levels')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_levels()
    {
        $this->signInViewer();

        $this->get('/levels')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_levels()
    {
        $this->get('/levels')->assertRedirect('login');
    }

    /** @test */
    public function an_admin_can_update_a_level()
    {
        $this->signInAdmin();

        $level = factory(Level::class)->create(['name' => 'Varsity']);

        $this->patch('api/levels/'.$level->id, ['name' => 'Junior Varsity'])
                ->assertStatus(200);

        $this->assertDatabaseHas('levels', [
            'name' => 'Junior Varsity',
        ]);
    }

    /** @test */
    public function a_coach_cannot_update_a_level()
    {
        $this->signInCoach();

        $level = factory(Level::class)->create(['name' => 'Varsity']);

        $this->patch('api/levels/'.$level->id, ['name' => 'Junior Varsity'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('levels', ['name' => 'Varsity']);
    }

    /** @test */
    public function an_athlete_cannot_update_a_level()
    {
        $this->signInAthlete();

        $level = factory(Level::class)->create(['name' => 'Varsity']);

        $this->patch('api/levels/'.$level->id, ['name' => 'Junior Varsity'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('levels', ['name' => 'Varsity']);
    }

    /** @test */
    public function a_viewer_cannot_update_a_level()
    {
        $this->signInViewer();

        $level = factory(Level::class)->create(['name' => 'Varsity']);

        $this->patch('api/levels/'.$level->id, ['name' => 'Junior Varsity'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('levels', ['name' => 'Varsity']);
    }

    /** @test */
    public function a_guest_cannot_update_a_level()
    {
        $level = factory(Level::class)->create(['name' => 'Varsity']);

        $this->patch('api/levels/'.$level->id, ['name' => 'Junior Varsity'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('levels', ['name' => 'Varsity']);
    }
}
