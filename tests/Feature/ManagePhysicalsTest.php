<?php

namespace Tests\Feature;

use App\Models\Athlete;
use App\Models\Physical;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManagePhysicalsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_coach_can_enter_a_physical()
    {

        $this->withExceptionHandling();
        $this->signInCoach();
        $athlete = factory(Athlete::class)->create();

        $attributes = [
            'athlete_id' => $athlete->id,
            'consent_form' => $this->faker->boolean($chanceOfGettingTrue = 80),
            'concussion_form' => $this->faker->boolean($chanceOfGettingTrue = 80),
            'evaluation_form' => $this->faker->boolean($chanceOfGettingTrue = 80),
            'exam_date' => $this->faker->date($format = 'Y-m-d', $max = 'now') ,
        ];

        $this->post('/api/physicals', $attributes);

        $this->assertDatabaseHas('physicals', $attributes);

        $this->get('/physicals')
            ->assertSee($attributes['athlete_id'])
            ->assertSee($attributes['exam_date']);
    }
}
