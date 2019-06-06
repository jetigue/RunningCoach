<?php

namespace Tests\Feature;

use App\Models\Runninglog\RunEffort;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

        $this->post('/api/runEfforts', $attributes)->assertStatus(201);

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

        $this->post('/api/runEfforts', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_a_run_effort()
    {
        $this->signInAthlete();

        $attributes = [
            'name' => 'Relaxed',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/runEfforts', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_run_effort()
    {
        $this->signInViewer();

        $attributes = [
            'name' => 'Relaxed',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/runEfforts', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_run_effort()
    {
        $attributes = [
            'name' => 'Relaxed',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/runEfforts', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_run_effort_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(RunEffort::class)->raw(['name' => '']);

        $this->post('api/runEfforts', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_run_effort_requires_a_description()
    {
        $this->signInAdmin();

        $attributes = factory(RunEffort::class)->raw(['description' => '']);

        $this->post('api/runEfforts', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */
    public function an_admin_can_view_run_types()
    {
        $this->signInAdmin();

        $this->get('/runEfforts')->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_run_types()
    {
        $this->signInCoach();

        $this->get('/runEfforts')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_run_types()
    {
        $this->signInAthlete();

        $this->get('/runEfforts')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_run_types()
    {
        $this->signInViewer();

        $this->get('/runEfforts')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_run_types()
    {
        $this->get('/runEfforts')->assertRedirect('/');
    }
}
