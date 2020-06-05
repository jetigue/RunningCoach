<?php

namespace Tests\Feature;

use App\Models\Athlete;
use App\Models\Training\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageAthletesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    protected $group;
    protected $attributes;
    protected $newAttributes;

    public function setUp(): void
    {
        parent::setUp();

        $this->group = factory(Group::class)->create();

        $this->attributes = [
            'first_name' => 'Roger',
            'last_name' => 'Bannister',
            'sex' => 'm',
            'dob' => $this->faker->date($format = 'Y-m-d'),
            'grad_year' => 2020,
            'status' => 'a',
            'training_group_id' => $this->group->id
        ];

        $this->newAttributes = [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'sex' => 'f',
            'dob' => $this->faker->date($format = 'Y-m-d'),
            'grad_year' => 2016,
            'status' => 'i',
            'training_group_id' => $this->group->id
        ];
    }

    /** @test */
    public function an_admin_can_create_an_athlete()
    {
        $this->signInAdmin();
        $this->withoutExceptionHandling();

        $this->post('/api/athletes', $this->attributes)->assertStatus(201);

        $this->assertDatabaseHas('athletes', $this->attributes);

    }

    /** @test */
    public function a_coach_can_create_an_athlete()
    {
        $this->signInCoach();

        $this->post('/api/athletes', $this->attributes)->assertStatus(201);

        $this->assertDatabaseHas('athletes', $this->attributes);
    }

    /** @test */
    public function an_athlete_cannot_create_an_athlete()
    {
        $this->signInAthlete();

        $this->post('/api/athletes', $this->attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_an_athlete()
    {
        $this->signInViewer();

        $this->post('/api/athletes', $this->attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_an_athlete()
    {
        $this->post('/api/athletes', $this->attributes)->assertRedirect('/');
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
             ->assertSee('name');
    }

    /** @test */
    public function an_coach_can_view_athletes()
    {
        $this->signInCoach();

        $this->get('/athletes')
            ->assertSee('name');
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
