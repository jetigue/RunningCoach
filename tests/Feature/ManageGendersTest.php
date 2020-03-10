<?php

namespace Tests\Feature;

use App\Models\Properties\Races\Gender;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageGendersTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_gender()
    {
        $this->signInAdmin();

        $attributes = ['name' => 'Boys'];

        $this->post('/api/genders', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('genders', $attributes);

        $this->get('/genders')
            ->assertSee($attributes['name']);
    }

    /** @test */
    public function a_coach_cannot_create_genders()
    {
        $this->signInCoach();

        $attributes = ['name' => 'Boys'];

        $this->post('/api/genders', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_genders()
    {
        $this->signInAthlete();

        $attributes = ['name' => 'Boys'];

        $this->post('/api/genders', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_genders()
    {
        $this->signInViewer();

        $attributes = ['name' => 'Boys'];

        $this->post('/api/genders', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_genders()
    {
        $attributes = ['name' => 'Boys'];

        $this->post('/api/genders', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_gender_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(Gender::class)->raw(['name' => '']);

        $this->post('api/genders', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function an_admin_can_view_genders()
    {
        $this->signInAdmin();

        $this->get('/genders')->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_genders()
    {
        $this->signInCoach();

        $this->get('/genders')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_genders()
    {
        $this->signInAthlete();

        $this->get('/genders')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_genders()
    {
        $this->signInViewer();

        $this->get('/genders')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_genders()
    {
        $this->get('/genders')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_gender()
    {
        $this->signInAdmin();

        $gender = factory(Gender::class)->create(['name' => 'Girls']);

        $this->patch('api/genders/'.$gender->id, ['name' => 'Boys'])
            ->assertStatus(200);

        $this->assertDatabaseHas('genders', [
            'name' => 'Boys',
        ]);
    }

    /** @test */
    public function a_coach_cannot_update_a_gender()
    {
        $this->signInCoach();

        $gender = factory(Gender::class)->create(['name' => 'Girls']);

        $this->patch('api/genders/'.$gender->id, ['name' => 'Boys'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('genders', ['name' => 'Girls']);
    }

    /** @test */
    public function an_athlete_cannot_update_a_gender()
    {
        $this->signInAthlete();

        $gender = factory(Gender::class)->create(['name' => 'Girls']);

        $this->patch('api/genders/'.$gender->id, ['name' => 'Boys'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('genders', ['name' => 'Girls']);
    }

    /** @test */
    public function a_viewer_cannot_update_an_gender()
    {
        $this->signInViewer();

        $gender = factory(Gender::class)->create(['name' => 'Girls']);

        $this->patch('api/genders/'.$gender->id, ['name' => 'Boys'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('genders', ['name' => 'Girls']);
    }

    /** @test */
    public function a_guest_cannot_update_an_gender()
    {
        $gender = factory(Gender::class)->create(['name' => 'Girls']);

        $this->patch('api/genders/'.$gender->id, ['name' => 'Boys'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('genders', ['name' => 'Girls']);
    }

//    /** @test */
//    public function an_admin_can_delete_a_gender()
//    {
//        $this->signInAdmin();
//
//        $gender = factory(Gender::class)->create(['name' => 'Gender']);
//
//        $this->json('DELETE', 'api/genders/ . $gender->id');

//        $response->assertStatus(204);

//        $this->assertDatabaseMissing('genders', $gender->toArray());
//    }
}
