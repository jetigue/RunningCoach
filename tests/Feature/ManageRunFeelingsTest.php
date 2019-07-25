<?php

namespace Tests\Feature;

use App\Models\Runninglog\RunFeeling;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageRunFeelingsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_run_feeling()
    {
        $this->withoutExceptionHandling();

        $this->signInAdmin();

        $attributes = [
            'name' => 'Great',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/runFeelings', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('run_feelings', $attributes);
    }

    /** @test */
    public function a_coach_cannot_create_a_run_feeling()
    {
        $this->signInCoach();

        $attributes = [
            'name' => 'Great',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/runFeelings', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_a_run_feeling()
    {
        $this->signInAthlete();

        $attributes = [
            'name' => 'Great',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/runFeelings', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_run_feeling()
    {
        $this->signInViewer();

        $attributes = [
            'name' => 'Great',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/runFeelings', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_run_feeling()
    {
        $attributes = [
            'name' => 'Great',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/runFeelings', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_run_feeling_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(RunFeeling::class)->raw(['name' => '']);

        $this->post('api/runFeelings', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_run_feeling_requires_a_description()
    {
        $this->signInAdmin();

        $attributes = factory(RunFeeling::class)->raw(['description' => '']);

        $this->post('api/runFeelings', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */
    public function an_admin_can_view_run_feelings()
    {
        $this->signInAdmin();

        $this->get('/runFeelings')->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_run_feelings()
    {
        $this->signInCoach();

        $this->get('/run-feelings')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_run_feelings()
    {
        $this->signInAthlete();

        $this->get('/run-feelings')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_run_feelings()
    {
        $this->signInViewer();

        $this->get('/run-feelings')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_run_feelings()
    {
        $this->get('/run-feelings')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_run_feeling()
    {
        $this->signInAdmin();

        $runFeeling = factory(RunFeeling::class)->create([
            'name' => 'Good',
            'description' => 'Original Description'
        ]);

        $this->patch('api/runFeelings/' . $runFeeling->id, [
            'name' => 'Great',
            'description' => 'New Description'
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('run_feelings', [
            'name' => 'Great',
            'description' =>'New Description'
        ]);
    }

    /** @test */
    public function a_coach_cannot_update_a_run_feeling()
    {
        $this->signInCoach();

        $runFeeling = factory(RunFeeling::class)->create([
            'name' => 'Good',
            'description' => 'Original Description'
        ]);

        $this->patch('api/runFeelings/' . $runFeeling->id, [
            'name' => 'Great',
            'description' => 'New Description'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('run_feelings', ['name' => 'Good']);
    }

    /** @test */
    public function an_athlete_cannot_update_a_run_feeling()
    {
        $this->signInAthlete();

        $runFeeling = factory(RunFeeling::class)->create([
            'name' => 'Good',
            'description' => 'Original Description'
        ]);

        $this->patch('api/runFeelings/' . $runFeeling->id, [
            'name' => 'Great',
            'description' => 'New Description'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('run_feelings', ['name' => 'Good']);
    }

    /** @test */
    public function a_viewer_cannot_update_a_run_feeling()
    {
        $this->signInViewer();

        $runFeeling = factory(RunFeeling::class)->create([
            'name' => 'Good',
            'description' => 'Original Description'
        ]);

        $this->patch('api/runFeelings/' . $runFeeling->id, [
            'name' => 'Great',
            'description' => 'New Description'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('run_feelings', ['name' => 'Good']);
    }

    /** @test */
    public function a_guest_cannot_update_a_run_feeling()
    {
        $runType = factory(RunFeeling::class)->create([
            'name' => 'Good',
            'description' => 'Original Description'
        ]);

        $this->patch('api/runFeelings/' . $runType->id, [
            'name' => 'Great',
            'description' => 'New Description'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('run_feelings', ['name' => 'Good']);
    }
}
