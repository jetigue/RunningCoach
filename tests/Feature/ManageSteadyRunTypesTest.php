<?php

namespace Tests\Feature;

use App\Models\Training\RunTypes\Steady;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageSteadyRunTypesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_steady_run_type()
    {
        $this->signInAdmin();

        $attributes = [
            'name' => 'Long Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/steady-run-types', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('steady_run_types', $attributes);
    }

    /** @test */
    public function a_coach_cannot_create_a_steady_run_type()
    {
        $this->signInCoach();

        $attributes = [
            'name' => 'Long Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/steady-run-types', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_a_steady_run_type()
    {
        $this->signInAthlete();

        $attributes = [
            'name' => 'Long Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/steady-run-types', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_steady_run_type()
    {
        $this->signInViewer();

        $attributes = [
            'name' => 'Long Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/steady-run-types', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_steady_run_type()
    {
        $attributes = [
            'name' => 'Long Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/steady-run-types', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_steady_run_type_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(Steady::class)->raw(['name' => '']);

        $this->post('api/steady-run-types', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function an_admin_can_view_steady_runs()
    {
        $this->signInAdmin();

        $this->get('/training/steady-run-types')->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_steady_runs()
    {
        $this->signInCoach();

        $this->get('/training/steady-run-types')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_steady_runs()
    {
        $this->signInAthlete();

        $this->get('/training/steady-run-types')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_steady_runs()
    {
        $this->signInViewer();

        $this->get('/training/steady-run-types')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_steady_runs()
    {
        $this->get('/training/steady-run-types')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_steady_run_type()
    {
        $this->signInAdmin();

        $steady = factory(Steady::class)->create([
            'name' => 'Long Run',
            'description' => 'Original Description',
        ]);

        $this->patch('api/steady-run-types/'.$steady->id, [
            'name' => 'Conditioning Run',
            'description' => 'New Description',
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('steady_run_types', [
            'name' => 'Conditioning Run',
            'description' =>'New Description',
        ]);
    }

    /** @test */
    public function a_coach_cannot_update_a_steady_run_type()
    {
        $this->signInCoach();

        $steady = factory(Steady::class)->create([
            'name' => 'Long Run',
            'description' => 'Original Description',
        ]);

        $this->patch('api/steady-run-types/'.$steady->id, [
            'name' => 'Conditioning Run',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('steady_run_types', ['name' => 'Long Run']);
    }

    /** @test */
    public function an_athlete_cannot_update_a_steady_run_type()
    {
        $this->signInAthlete();

        $steady = factory(Steady::class)->create([
            'name' => 'Long Run',
            'description' => 'Original Description',
        ]);

        $this->patch('api/steady-run-types/'.$steady->id, [
            'name' => 'Conditioning Run',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('steady_run_types', ['name' => 'Long Run']);
    }

    /** @test */
    public function a_viewer_cannot_update_a_steady_run_type()
    {
        $this->signInViewer();

        $steady = factory(Steady::class)->create([
            'name' => 'Long Run',
            'description' => 'Original Description',
        ]);

        $this->patch('api/steady-run-types/'.$steady->id, [
            'name' => 'Conditioning Run',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('steady_run_types', ['name' => 'Long Run']);
    }

    /** @test */
    public function a_guest_cannot_update_a_steady_run_type()
    {
        $steady = factory(Steady::class)->create([
            'name' => 'Long Run',
            'description' => 'Original Description',
        ]);

        $this->patch('api/steady-run-types/'.$steady->id, [
            'name' => 'Conditioning Run',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('steady_run_types', ['name' => 'Long Run']);
    }
}
