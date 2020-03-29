<?php

namespace Tests\Feature;

use App\Models\Properties\Meets\Track\Name;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageTrackMeetNamesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_meet_name()
    {
        $this->withoutExceptionHandling();
        $this->signInAdmin();

        $attributes = [
            'name' => $this->faker->word.' '.'Stadium'
        ];

        $this->post('/api/track/meet-names', $attributes);

        $this->assertDatabaseHas('track_meet_names', $attributes);

        $this->get('/track/meet-names')
            ->assertSee($attributes['name']);
    }

    /** @test */
    public function a_coach_can_create_a_meet_name()
    {
        $this->signInCoach();

        $attributes = [
            'name' => $this->faker->word.' '.'Stadium',
        ];

        $this->post('/api/track/meet-names', $attributes);

        $this->assertDatabaseHas('track_meet_names', $attributes);

        $this->get('/track/meet-names')
            ->assertSee($attributes['name']);
    }

    /** @test */
    public function a_meet_name_requires_a_name()
    {
        $this->signInCoach();

        $attributes = factory(Name::class)->raw(['name' => '']);

        $this->post('api/track/meet-names', $attributes)->assertSessionHasErrors('name');
    }


    /** @test */
    public function an_athlete_cannot_create_meet_names()
    {
        $this->signInAthlete();

        $attributes = [
            'name' => $this->faker->word.' '.'Park'
        ];

        $this->post('/api/track/meet-names', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_meet_names()
    {
        $this->signInViewer();

        $attributes = [
            'name' => $this->faker->word.' '.'Park'
        ];

        $this->post('/api/track/meet-names', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_meet_names()
    {
        $attributes = [
            'name' => $this->faker->word.' '.'Park'
        ];

        $this->post('/api/track/meet-names', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_view_meet_names()
    {
        $this->signInAdmin();

        $this->get('/track/meet-names')->assertSee('name');
    }

    /** @test */
    public function a_coach_can_view_meet_names()
    {
        $this->signInCoach();

        $this->get('/track/meet-names')->assertSee('name');
    }

    /** @test */
    public function an_athlete_cannot_view_meet_names()
    {
        $this->signInAthlete();

        $this->get('/track/meet-names')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_meet_names()
    {
        $this->signInViewer();

        $this->get('/track/meet-names')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_meet_names()
    {
        $this->get('/track/meet-names')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_meet_name()
    {
        $this->signInAdmin();

        $name = factory(Name::class)->create([
            'name' => 'Original Meet Name'
        ]);

        $this->patch('/api/track/meet-names/'.$name->id, [
            'name' => 'New Meet Name'
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('track_meet_names', [
            'name' => 'New Meet Name',
        ]);
    }

    /** @test */
    public function a_coach_can_update_a_meet_name()
    {
        $this->signInCoach();

        $name = factory(Name::class)->create([
            'name' => 'Original Meet Name'
        ]);

        $this->patch('/api/track/meet-names/'.$name->id, [
            'name' => 'New Meet Name',
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('track_meet_names', [
            'name' => 'New Meet Name',
        ]);
    }

    /** @test */
    public function an_athlete_cannot_update_a_meet_name()
    {
        $this->signInAthlete();

        $name = factory(Name::class)->create([
            'name' => 'Original Meet Name'
        ]);

        $this->patch('/api/track/meet-names/'.$name->id, [
            'name' => 'New Meet Name'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('track_meet_names', ['name' => 'Original Meet Name']);
    }

    /** @test */
    public function a_viewer_cannot_update_a_meet_name()
    {
        $this->signInViewer();

        $name = factory(Name::class)->create([
            'name' => 'Original Meet Name',
        ]);

        $this->patch('/api/track/meet-names/'.$name->id, [
            'name' => 'New Meet Name'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('track_meet_names', ['name' => 'Original Meet Name']);
    }

    /** @test */
    public function a_guest_cannot_update_a_meet_name()
    {

        $name = factory(Name::class)->create([
            'name' => 'Original Meet Name',
        ]);

        $this->patch('/api/track/meet-names/'.$name->id, [
            'name' => 'New Meet Name',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('track_meet_names', ['name' => 'Original Meet Name']);
    }
}
