<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageRunningLogTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_authorized_user_can_log_a_run()
    {
        $this->withoutExceptionHandling();

        $this->signInViewer();

        $hours = $this->faker->numberBetween($min = 0, $max = 2);
        $minutes = $this->faker->numberBetween($min = 5, $max = 59);
        $seconds = $this->faker->numberBetween($min = 0, $max = 59);
        $totalSeconds = $hours * 3600 + $minutes * 60 + $seconds;

        $attributes = [
            'user_id' => 1,
            'run_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'distance' => $this->faker->randomFloat($nbMaxDecimals = 1, $min = 1, $max = 12),
            'hours' => $hours,
            'minutes' => $minutes,
            'seconds' => $seconds,
            'total_seconds' => $hours * 3600 + $minutes * 60 + $seconds,
            'day_time_id'  => $this->faker->numberBetween($min = 1, $max = 4),
            'run_type_id'  => $this->faker->numberBetween($min = 1, $max = 5),
            'terrain_type_id'  => $this->faker->numberBetween($min = 1, $max = 5),
            'run_effort_id'  => $this->faker->numberBetween($min = 1, $max = 5),
            'run_feeling_id'  => $this->faker->numberBetween($min = 1, $max = 5),
        ];
        //dd($attributes);
        $this->post('/api/running-log', $attributes)->assertStatus(201);

//        $this->assertDatabaseHas('running_logs', $attributes);

//        $this->get('/running-log')
//            ->assertSee($attributes['run_date'])
//            ->assertSee($attributes['user_id']);
    }
}
