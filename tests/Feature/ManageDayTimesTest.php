<?php

namespace Tests\Feature;

use App\Models\Properties\General\DayTime;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageDayTimesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_day_time()
    {
        $this->withoutExceptionHandling();

        $this->signInAdmin();

        $attributes = [
            'name' => 'Morning',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/dayTimes', $attributes)->assertStatus(201);

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

        $this->post('/api/dayTimes', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_a_day_time()
    {
        $this->signInAthlete();

        $attributes = [
            'name' => 'Easy Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/dayTimes', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_day_time()
    {
        $this->signInViewer();

        $attributes = [
            'name' => 'Easy Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/dayTimes', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_day_time()
    {
        $attributes = [
            'name' => 'Easy Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/dayTimes', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_day_time_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(DayTime::class)->raw(['name' => '']);

        $this->post('api/dayTimes', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_day_time_requires_a_description()
    {
        $this->signInAdmin();

        $attributes = factory(DayTime::class)->raw(['description' => '']);

        $this->post('api/dayTimes', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */
    public function an_admin_can_view_day_times()
    {
        $this->signInAdmin();

        $this->get('/dayTimes')->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_day_times()
    {
        $this->signInCoach();

        $this->get('/dayTimes')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_day_times()
    {
        $this->signInAthlete();

        $this->get('/dayTimes')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_day_times()
    {
        $this->signInViewer();

        $this->get('/dayTimes')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_day_times()
    {
        $this->get('/dayTimes')->assertRedirect('/');
    }
}
