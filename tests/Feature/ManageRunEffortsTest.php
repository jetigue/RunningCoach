<?php

namespace Tests\Feature;

use App\Models\Runninglog\RunEffort;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageRunEffortsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_run_effort()
    {
        $this->signInAdmin();

        $attributes = [
            'name' => 'Relaxed',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/run-efforts', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('run_efforts', $attributes);
    }

    /** @test */
    public function a_coach_cannot_create_a_run_effort()
    {
        $this->signInCoach();

        $attributes = [
            'name' => 'Relaxed',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/run-efforts', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_a_run_effort()
    {
        $this->signInAthlete();

        $attributes = [
            'name' => 'Relaxed',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/run-efforts', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_run_effort()
    {
        $this->signInViewer();

        $attributes = [
            'name' => 'Relaxed',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/run-efforts', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_run_effort()
    {
        $attributes = [
            'name' => 'Relaxed',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/run-efforts', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_run_effort_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(RunEffort::class)->raw(['name' => '']);

        $this->post('api/run-efforts', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_run_effort_requires_a_description()
    {
        $this->signInAdmin();

        $attributes = factory(RunEffort::class)->raw(['description' => '']);

        $this->post('api/run-efforts', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */
    public function an_admin_can_view_run_types()
    {
        $this->signInAdmin();

        $this->get('/run-efforts')->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_run_types()
    {
        $this->signInCoach();

        $this->get('/run-efforts')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_run_types()
    {
        $this->signInAthlete();

        $this->get('/run-efforts')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_run_types()
    {
        $this->signInViewer();

        $this->get('/run-efforts')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_run_types()
    {
        $this->get('/run-efforts')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_run_effort()
    {
        $this->signInAdmin();

        $runEffort = factory(RunEffort::class)->create([
            'name' => 'Easy',
            'description' => 'Original Description',
        ]);

        $this->patch('api/run-efforts/'.$runEffort->id, [
            'name' => 'Hard',
            'description' => 'New Description',
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('run_efforts', [
            'name' => 'Hard',
            'description' =>'New Description',
        ]);
    }

    /** @test */
    public function a_coach_cannot_update_a_run_effort()
    {
        $this->signInCoach();

        $runEffort = factory(RunEffort::class)->create([
            'name' => 'Easy',
            'description' => 'Original Description',
        ]);

        $this->patch('api/run-efforts/'.$runEffort->id, [
            'name' => 'Hard',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('run_efforts', ['name' => 'Easy']);
    }

    /** @test */
    public function an_athlete_cannot_update_a_run_effort()
    {
        $this->signInAthlete();

        $runEffort = factory(RunEffort::class)->create([
            'name' => 'Easy',
            'description' => 'Original Description',
        ]);

        $this->patch('api/run-efforts/'.$runEffort->id, [
            'name' => 'Hard',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('run_efforts', ['name' => 'Easy']);
    }

    /** @test */
    public function a_viewer_cannot_update_a_run_effort()
    {
        $this->signInViewer();

        $runEffort = factory(RunEffort::class)->create([
            'name' => 'Easy',
            'description' => 'Original Description',
        ]);

        $this->patch('api/run-efforts/'.$runEffort->id, [
            'name' => 'Hard',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('run_efforts', ['name' => 'Easy']);
    }

    /** @test */
    public function a_guest_cannot_update_a_run_effort()
    {
        $runEffort = factory(RunEffort::class)->create([
            'name' => 'Easy',
            'description' => 'Original Description',
        ]);

        $this->patch('api/run-efforts/'.$runEffort->id, [
            'name' => 'Hard',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('run_efforts', ['name' => 'Easy']);
    }
}
