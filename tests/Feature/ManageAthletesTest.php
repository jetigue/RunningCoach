<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Athlete;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageAthletesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_an_athlete()
    {
        $this->signInAdmin();

        $attributes = [
            'first_name' => 'Roger',
            'last_name' => 'Bannister',
            'sex' => 'm',
            'dob' => $this->faker->date($format = 'Y-m-d'),
            'grad_year' => 2020,
            'status' => 'a',
        ];

        $this->post('/api/athletes', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('athletes', $attributes);

        $this->get('/athletes')
        ->assertSee($attributes['first_name'])
        ->assertSee($attributes['last_name'])
        ->assertSee($attributes['sex'])
        ->assertSee($attributes['dob'])
        ->assertSee($attributes['grad_year'])
        ->assertSee($attributes['status']);
    }

    /** @test */
    public function a_coach_can_create_an_athlete()
    {
        $this->signInCoach();

        $attributes = [
            'first_name' => 'Roger',
            'last_name' => 'Bannister',
            'sex' => 'm',
            'dob' => $this->faker->date($format = 'Y-m-d'),
            'grad_year' => 2020,
            'status' => 'a',
        ];

        $this->post('/api/athletes', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('athletes', $attributes);

        $this->get('/athletes')
            ->assertSee($attributes['first_name'])
            ->assertSee($attributes['last_name'])
            ->assertSee($attributes['sex'])
            ->assertSee($attributes['dob'])
            ->assertSee($attributes['grad_year'])
            ->assertSee($attributes['status']);
    }

    /** @test */
    public function an_athlete_cannot_create_an_athlete()
    {
        $this->signInAthlete();

        $attributes = [
            'first_name' => 'Roger',
            'last_name' => 'Bannister',
            'sex' => 'm',
            'dob' => $this->faker->date($format = 'Y-m-d'),
            'grad_year' => 2020,
            'status' => 'a',
        ];

        $this->post('/api/athletes', $attributes)->assertRedirect('/');

    }

    /** @test */
    public function a_viewer_cannot_create_an_athlete()
    {
        $this->signInViewer();

        $attributes = [
            'first_name' => 'Roger',
            'last_name' => 'Bannister',
            'sex' => 'm',
            'dob' => $this->faker->date($format = 'Y-m-d'),
            'grad_year' => 2020,
            'status' => 'a',
        ];

        $this->post('/api/athletes', $attributes)->assertRedirect('/');

    }

    /** @test */
    public function a_guest_cannot_create_an_athlete()
    {

        $attributes = [
            'first_name' => 'Roger',
            'last_name' => 'Bannister',
            'sex' => 'm',
            'dob' => $this->faker->date($format = 'Y-m-d'),
            'grad_year' => 2020,
            'status' => 'a',
        ];

        $this->post('/api/athletes', $attributes)->assertRedirect('/');

    }

     /** @test */
     public function an_athlete_requires_a_first_name()
     {
         $this->signInCoach();

         $attributes = factory(Athlete::class)->raw(['first_name' => '']);

         $this->post('api/athletes', $attributes)->assertSessionHasErrors('first_name');
     }

    /** @test */
    public function an_athlete_requires_a_last_name()
    {
        $this->signInCoach();

        $attributes = factory(Athlete::class)->raw(['last_name' => '']);

        $this->post('api/athletes', $attributes)->assertSessionHasErrors('last_name');
    }

    /** @test */
    public function an_athlete_requires_a_sex()
    {
        $this->signInCoach();

        $attributes = factory(Athlete::class)->raw(['sex' => '']);

        $this->post('api/athletes', $attributes)->assertSessionHasErrors('sex');
    }

    /** @test */
    public function an_athlete_requires_a_grad_year()
    {
        $this->signInCoach();

        $attributes = factory(Athlete::class)->raw(['grad_year' => '']);

        $this->post('api/athletes', $attributes)->assertSessionHasErrors('grad_year');
    }

    /** @test */
    public function an_athlete_requires_a_status()
    {
        $this->signInCoach();

        $attributes = factory(Athlete::class)->raw(['status' => '']);

        $this->post('api/athletes', $attributes)->assertSessionHasErrors('status');
    }

     /** @test */
     public function an_admin_can_view_athletes()
     {
         $this->signInAdmin();

         $this->get('/athletes')
             ->assertSee('name')
             ->assertSee('status');
     }

    /** @test */
    public function an_coach_can_view_athletes()
    {
        $this->signInCoach();

        $this->get('/athletes')
            ->assertSee('name')
            ->assertSee('status');
    }

    /** @test */
    public function an_athlete_cannot_view_athletes()
    {
        $this->signInAthlete();

        $this->get('/athletes')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_divisions()
    {
        $this->signInViewer();

        $this->get('/athletes')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_divisions()
    {
        $this->get('/athletes')->assertRedirect('/');
    }
}
