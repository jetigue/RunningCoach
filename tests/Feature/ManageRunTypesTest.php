<?php

namespace Tests\Feature;

use App\Models\RunningLog\RunType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageRunTypesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_run_type()
    {
        $this->signInAdmin();

        $attributes = [
            'name' => 'Easy Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/run-types', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('run_types', $attributes);
    }

    /** @test */
    public function a_coach_cannot_create_a_run_type()
    {
        $this->signInCoach();

        $attributes = [
            'name' => 'Easy Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/run-types', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_a_run_type()
    {
        $this->signInAthlete();

        $attributes = [
            'name' => 'Easy Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/run-types', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_run_type()
    {
        $this->signInViewer();

        $attributes = [
            'name' => 'Easy Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/run-types', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_run_type()
    {
        $attributes = [
            'name' => 'Easy Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/run-types', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_run_type_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(RunType::class)->raw(['name' => '']);

        $this->post('api/run-types', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_run_type_requires_a_description()
    {
        $this->signInAdmin();

        $attributes = factory(RunType::class)->raw(['description' => '']);

        $this->post('api/run-types', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */
    public function an_admin_can_view_run_types()
    {
        $this->signInAdmin();

        $this->get('/run-types')->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_run_types()
    {
        $this->signInCoach();

        $this->get('/run-types')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_run_types()
    {
        $this->signInAthlete();

        $this->get('/run-types')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_run_types()
    {
        $this->signInViewer();

        $this->get('/run-types')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_run_types()
    {
        $this->get('/run-types')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_run_type()
    {
        $this->signInAdmin();

        $runType = factory(RunType::class)->create([
            'name' => 'Fartlek',
            'description' => 'Original Description',
        ]);

        $this->patch('api/run-types/'.$runType->id, [
            'name' => 'Long Run',
            'description' => 'New Description',
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('run_types', [
            'name' => 'Long Run',
            'description' =>'New Description',
        ]);
    }

    /** @test */
    public function a_coach_cannot_update_a_run_type()
    {
        $this->signInCoach();

        $runType = factory(RunType::class)->create([
            'name' => 'Fartlek',
            'description' => 'Original Description',
        ]);

        $this->patch('api/run-types/'.$runType->id, [
            'name' => 'Long Run',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('run_types', ['name' => 'Fartlek']);
    }

    /** @test */
    public function an_athlete_cannot_update_a_run_type()
    {
        $this->signInAthlete();

        $runType = factory(RunType::class)->create([
            'name' => 'Fartlek',
            'description' => 'Original Description',
        ]);

        $this->patch('api/run-types/'.$runType->id, [
            'name' => 'Long Run',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('run_types', ['name' => 'Fartlek']);
    }

    /** @test */
    public function a_viewer_cannot_update_a_run_type()
    {
        $this->signInViewer();

        $runType = factory(RunType::class)->create([
            'name' => 'Fartlek',
            'description' => 'Original Description',
        ]);

        $this->patch('api/run-types/'.$runType->id, [
            'name' => 'Long Run',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('run_types', ['name' => 'Fartlek']);
    }

    /** @test */
    public function a_guest_cannot_update_a_run_type()
    {
        $runType = factory(RunType::class)->create([
            'name' => 'Fartlek',
            'description' => 'Original Description',
        ]);

        $this->patch('api/run-types/'.$runType->id, [
            'name' => 'Long Run',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('run_types', ['name' => 'Fartlek']);
    }
}
