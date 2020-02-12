<?php

namespace Tests\Feature;

use App\Models\Properties\General\TrackSurface;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageTrackSurfacesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_track_surface()
    {
        $this->signInAdmin();

        $attributes = [
            'name' => 'Rubber',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/track-surfaces', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('track_surfaces', $attributes);
    }

    /** @test */
    public function a_coach_cannot_create_a_track_surface()
    {
        $this->signInCoach();

        $attributes = [
            'name' => 'Rubber',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/track-surfaces', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_a_track_surface()
    {
        $this->signInAthlete();

        $attributes = [
            'name' => 'Rubber',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/track-surfaces', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_track_surface()
    {
        $this->signInViewer();

        $attributes = [
            'name' => 'Rubber',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/track-surfaces', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_track_surface()
    {
        $attributes = [
            'name' => 'Rubber',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/track-surfaces', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_track_surface_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(TrackSurface::class)->raw(['name' => '']);

        $this->post('api/track-surfaces', $attributes)->assertSessionHasErrors('name');
    }

//    /** @test */
//    public function a_track_surface_requires_a_description()
//    {
//        $this->signInAdmin();
//
//        $attributes = factory(TrackSurface::class)->raw(['description' => '']);
//
//        $this->post('api/track-surfaces', $attributes)->assertSessionHasErrors('description');
//    }

    /** @test */
    public function an_admin_can_view_track_surfaces()
    {
        $this->signInAdmin();

        $this->get('/track-surfaces')->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_track_surfaces()
    {
        $this->signInCoach();

        $this->get('/terrain-types')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_track_surfaces()
    {
        $this->signInAthlete();

        $this->get('/terrain-types')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_track_surfaces()
    {
        $this->signInViewer();

        $this->get('/terrain-types')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_track_surfaces()
    {
        $this->get('/terrain-types')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_track_surface()
    {
        $this->signInAdmin();

        $trackSurface = factory(TrackSurface::class)->create([
            'name' => 'Rubber',
            'description' => 'Original Description'
        ]);

        $this->patch('api/track-surfaces/' . $trackSurface->id, [
            'name' => 'Rekoten',
            'description' => 'New Description'
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('track_surfaces', [
            'name' => 'Rekoten',
            'description' =>'New Description'
        ]);
    }

    /** @test */
    public function a_coach_cannot_update_a_track_surface()
    {
        $this->signInCoach();

        $trackSurface = factory(TrackSurface::class)->create([
            'name' => 'Rubber',
            'description' => 'Original Description'
        ]);

        $this->patch('api/track-surfaces/' . $trackSurface->id, [
            'name' => 'Rekoten',
            'description' => 'New Description'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('track_surfaces', ['name' => 'Rubber']);
    }

    /** @test */
    public function an_athlete_cannot_update_a_track_surface()
    {
        $this->signInAthlete();

        $trackSurface = factory(TrackSurface::class)->create([
            'name' => 'Rubber',
            'description' => 'Original Description'
        ]);

        $this->patch('api/track-surfaces/' . $trackSurface->id, [
            'name' => 'Rekoten',
            'description' => 'New Description'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('track_surfaces', ['name' => 'Rubber']);
    }

    /** @test */
    public function a_viewer_cannot_update_a_track_surface()
    {
        $this->signInViewer();

        $trackSurface = factory(TrackSurface::class)->create([
            'name' => 'Rubber',
            'description' => 'Original Description'
        ]);

        $this->patch('api/track-surfaces/' . $trackSurface->id, [
            'name' => 'Rekoten',
            'description' => 'New Description'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('track_surfaces', ['name' => 'Rubber']);
    }

    /** @test */
    public function a_guest_cannot_update_a_track_surface()
    {
        $trackSurface = factory(TrackSurface::class)->create([
            'name' => 'Rubber',
            'description' => 'Original Description'
        ]);

        $this->patch('api/track-surfaces/' . $trackSurface->id, [
            'name' => 'Rekoten',
            'description' => 'New Description'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('track_surfaces', ['name' => 'Rubber']);
    }
}
