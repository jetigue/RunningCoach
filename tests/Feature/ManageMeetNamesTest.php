<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\General\Season;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageMeetNamesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_meet_name()
    {
        $this->signInAdmin();

        $season = factory(Season::class)->create();

        $attributes = [
            'name' => $this->faker->word . " " . "Park",
            'season_id' => $season->id
        ];

        $this->post('/api/meetNames', $attributes);

        $this->assertDatabaseHas('meet_names', $attributes);

        $this->get('/meet-names')
            ->assertSee($attributes['name'])
            ->assertSee($attributes['season_id']);
    }

    /** @test */
    public function a_coach_can_create_a_meet_name()
    {
        $this->signInCoach();

        $season = factory(Season::class)->create();

        $attributes = [
            'name' => $this->faker->word . " " . "Park",
            'season_id' => $season->id
        ];

        $this->post('/api/meetNames', $attributes);

        $this->assertDatabaseHas('meet_names', $attributes);

        $this->get('/meet-names')
            ->assertSee($attributes['name'])
            ->assertSee($attributes['season_id']);
    }

     /** @test */
     public function a_meet_name_requires_a_name()
     {
         $this->signInCoach();

        $attributes = factory(Name::class)->raw(['name' => '']);

        $this->post('api/meetNames', $attributes)->assertSessionHasErrors('name');
     }

    /** @test */
    public function a_meet_name_requires_a_season_id()
    {
        $this->signInCoach();

        $attributes = factory(Name::class)->raw(['season_id' => '']);

        $this->post('api/meetNames', $attributes)->assertSessionHasErrors('season_id');
    }

    /** @test */
    public function an_athlete_cannot_create_meet_names()
    {
        $this->signInAthlete();

        $season = factory(Season::class)->create();

        $attributes = [
            'name' => $this->faker->word . " " . "Park",
            'season_id' => $season->id
        ];

        $this->post('/api/meetNames', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_meet_names()
    {
        $this->signInViewer();

        $season = factory(Season::class)->create();

        $attributes = [
            'name' => $this->faker->word . " " . "Park",
            'season_id' => $season->id
        ];

        $this->post('/api/meetNames', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_meet_names()
    {
        $season = factory(Season::class)->create();

        $attributes = [
            'name' => $this->faker->word . " " . "Park",
            'season_id' => $season->id
        ];

        $this->post('/api/meetNames', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_view_meet_names()
    {
        $this->signInAdmin();

        $this->get('/meet-names')->assertSee('name');
    }

    /** @test */
    public function a_coach_can_view_meet_names()
    {
        $this->signInCoach();

        $this->get('/meet-names')->assertSee('name');
    }

    /** @test */
    public function an_athlete_cannot_view_meet_names()
    {
        $this->signInAthlete();

        $this->get('/meet-names')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_meet_names()
    {
        $this->signInViewer();

        $this->get('/meet-names')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_meet_names()
    {
        $this->get('/meet-names')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_meet_name()
    {
        $this->signInAdmin();

        $season = factory(Season::class)->create();

        $name = factory(Name::class)->create([
            'name' => 'Original Meet Name',
            'season_id' => $season->id
        ]);

        $this->patch('api/meetNames/' . $name->id, [
            'name' => 'New Meet Name',
            'season_id' => $season->id
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('meet_names', [
            'name' => 'New Meet Name'
        ]);
    }

    /** @test */
    public function a_coach_can_update_a_meet_name()
    {
        $this->signInCoach();

        $season = factory(Season::class)->create();

        $name = factory(Name::class)->create([
            'name' => 'Original Meet Name',
            'season_id' => $season->id
        ]);

        $this->patch('api/meetNames/' . $name->id, [
            'name' => 'New Meet Name',
            'season_id' => $season->id
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('meet_names', [
            'name' => 'New Meet Name'
        ]);
    }

    /** @test */
    public function an_athlete_cannot_update_a_meet_name()
    {
        $this->signInAthlete();

        $season = factory(Season::class)->create();

        $name = factory(Name::class)->create([
            'name' => 'Original Meet Name',
            'season_id' => $season->id
        ]);

        $this->patch('api/meetNames/' . $name->id, [
            'name' => 'New Meet Name',
            'season_id' => $season->id
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('meet_names', ['name' => 'Original Meet Name']);
    }

    /** @test */
    public function a_viewer_cannot_update_a_meet_name()
    {
        $this->signInViewer();

        $season = factory(Season::class)->create();

        $name = factory(Name::class)->create([
            'name' => 'Original Meet Name',
            'season_id' => $season->id
        ]);

        $this->patch('api/meetNames/' . $name->id, [
            'name' => 'New Meet Name',
            'season_id' => $season->id
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('meet_names', ['name' => 'Original Meet Name']);
    }

    /** @test */
    public function a_guest_cannot_update_a_meet_name()
    {
        $season = factory(Season::class)->create();

        $name = factory(Name::class)->create([
            'name' => 'Original Meet Name',
            'season_id' => $season->id
        ]);

        $this->patch('api/meetNames/' . $name->id, [
            'name' => 'New Meet Name',
            'season_id' => $season->id
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('meet_names', ['name' => 'Original Meet Name']);
    }
}
