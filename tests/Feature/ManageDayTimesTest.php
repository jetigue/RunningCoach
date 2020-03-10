<?php

namespace Tests\Feature;

use App\Models\Properties\General\DayTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageDayTimesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_day_time()
    {
        $this->signInAdmin();

        $attributes = [
            'name' => 'Morning',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/day-times', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('day_times', $attributes);
    }

    /** @test */
    public function a_coach_cannot_create_a_day_time()
    {
        $this->signInCoach();

        $attributes = [
            'name' => 'Easy Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/day-times', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_a_day_time()
    {
        $this->signInAthlete();

        $attributes = [
            'name' => 'Easy Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/day-times', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_day_time()
    {
        $this->signInViewer();

        $attributes = [
            'name' => 'Easy Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/day-times', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_day_time()
    {
        $attributes = [
            'name' => 'Easy Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/day-times', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_day_time_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(DayTime::class)->raw(['name' => '']);

        $this->post('api/day-times', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_day_time_requires_a_description()
    {
        $this->signInAdmin();

        $attributes = factory(DayTime::class)->raw(['description' => '']);

        $this->post('api/day-times', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */
    public function an_admin_can_view_day_times()
    {
        $this->signInAdmin();

        $this->get('/day-times')->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_day_times()
    {
        $this->signInCoach();

        $this->get('/day-times')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_day_times()
    {
        $this->signInAthlete();

        $this->get('/day-times')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_day_times()
    {
        $this->signInViewer();

        $this->get('/day-times')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_day_times()
    {
        $this->get('/day-times')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_day_time()
    {
        $this->signInAdmin();

        $dayTime = factory(DayTime::class)->create([
            'name' => 'Morning',
            'description' => 'Original Description',
        ]);

        $this->patch('api/day-times/'.$dayTime->id, [
            'name' => 'Afternoon',
            'description' => 'New Description',
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('day_times', [
            'name' => 'Afternoon',
            'description' =>'New Description',
        ]);
    }

    /** @test */
    public function a_coach_cannot_update_a_day_time()
    {
        $this->signInCoach();

        $dayTime = factory(DayTime::class)->create([
            'name' => 'Morning',
            'description' => 'Original Description',
        ]);

        $this->patch('api/day-times/'.$dayTime->id, [
            'name' => 'Afternoon',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('day_times', ['name' => 'Morning']);
    }

    /** @test */
    public function an_athlete_cannot_update_a_day_time()
    {
        $this->signInAthlete();

        $dayTime = factory(DayTime::class)->create([
            'name' => 'Morning',
            'description' => 'Original Description',
        ]);

        $this->patch('api/day-times/'.$dayTime->id, [
            'name' => 'Afternoon',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('day_times', ['name' => 'Morning']);
    }

    /** @test */
    public function a_viewer_cannot_update_a_day_time()
    {
        $this->signInViewer();

        $dayTime = factory(DayTime::class)->create([
            'name' => 'Morning',
            'description' => 'Original Description',
        ]);

        $this->patch('api/day-times/'.$dayTime->id, [
            'name' => 'Afternoon',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('day_times', ['name' => 'Morning']);
    }

    /** @test */
    public function a_guest_cannot_update_a_day_time()
    {
        $dayTime = factory(DayTime::class)->create([
            'name' => 'Morning',
            'description' => 'Original Description',
        ]);

        $this->patch('api/day-times/'.$dayTime->id, [
            'name' => 'Afternoon',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('day_times', ['name' => 'Morning']);
    }
}
