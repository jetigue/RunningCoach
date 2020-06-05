<?php

namespace Tests\Feature;

use App\Models\Training\RunTypes\Interval;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageIntervalRunsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_interval_run_type()
    {
        $this->signInAdmin();

        $attributes = [
            'name' => 'Intervals',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/interval-run-types', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('interval_run_types', $attributes);
    }

    /** @test */
    public function a_coach_cannot_create_a_interval_run()
    {
        $this->signInCoach();

        $attributes = [
            'name' => 'Intervals',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/interval-run-types', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_a_interval_run()
    {
        $this->signInAthlete();

        $attributes = [
            'name' => 'Intervals',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/interval-run-types', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_interval_run()
    {
        $this->signInViewer();

        $attributes = [
            'name' => 'Intervals',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/interval-run-types', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_interval_run()
    {
        $attributes = [
            'name' => 'Intervals',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/interval-run-types', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_interval_run_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(Interval::class)->raw(['name' => '']);

        $this->post('api/interval-run-types', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function an_admin_can_view_interval_runs()
    {
        $this->signInAdmin();

        $this->get('/training/interval-run-types')->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_interval_runs()
    {
        $this->signInCoach();

        $this->get('/training/interval-run-types')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_interval_runs()
    {
        $this->signInAthlete();

        $this->get('/training/interval-run-types')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_interval_runs()
    {
        $this->signInViewer();

        $this->get('/training/interval-run-types')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_interval_runs()
    {
        $this->get('/training/interval-run-types')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_interval_run()
    {
        $this->signInAdmin();

        $interval = factory(Interval::class)->create([
            'name' => 'Intervals',
            'description' => 'Original Description',
        ]);

        $this->patch('api/interval-run-types/'.$interval->id, [
            'name' => 'Fartlek',
            'description' => 'New Description',
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('interval_run_types', [
            'name' => 'Fartlek',
            'description' =>'New Description',
        ]);
    }

    /** @test */
    public function a_coach_cannot_update_a_interval_run()
    {
        $this->signInCoach();

        $interval = factory(Interval::class)->create([
            'name' => 'Intervals',
            'description' => 'Original Description',
        ]);

        $this->patch('api/interval-run-types/'.$interval->id, [
            'name' => 'Fartlek',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('interval_run_types', ['name' => 'Intervals']);
    }

    /** @test */
    public function an_athlete_cannot_update_a_interval_run()
    {
        $this->signInAthlete();

        $interval = factory(Interval::class)->create([
            'name' => 'Intervals',
            'description' => 'Original Description',
        ]);

        $this->patch('api/interval-run-types/'.$interval->id, [
            'name' => 'Fartlek',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('interval_run_types', ['name' => 'Intervals']);
    }

    /** @test */
    public function a_viewer_cannot_update_a_interval_run()
    {
        $this->signInViewer();

        $interval = factory(Interval::class)->create([
            'name' => 'Intervals',
            'description' => 'Original Description',
        ]);

        $this->patch('api/interval-run-types/'.$interval->id, [
            'name' => 'Fartlek',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('interval_run_types', ['name' => 'Intervals']);
    }

    /** @test */
    public function a_guest_cannot_update_a_interval_run()
    {
        $interval = factory(Interval::class)->create([
            'name' => 'Intervals',
            'description' => 'Original Description',
        ]);

        $this->patch('api/interval-run-types/'.$interval->id, [
            'name' => 'Fartlek',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('interval_run_types', ['name' => 'Intervals']);
    }
}
