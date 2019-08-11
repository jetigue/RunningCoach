<?php

namespace Tests\Feature;

use App\Models\Athlete;
use App\Models\Physical;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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

    /** @test */
    public function only_a_user_can_upload_a_physical()
    {
        $this->withExceptionhandling();

        $this->json('POST', '/api/physicals/{physical}/physical-form')
            ->assertStatus(401);
    }

    /** @test */
    public function a_valid_physical_form_must_be_provided()
    {
        $this->withExceptionhandling()->signInCoach();

        $this->json('POST', '/api/physicals/{physical}/physical-form', [
            'physical-form' => 'not-a-file'
        ])->assertStatus(422);
    }

    /** @test */
    public function a_coach_can_upload_a_physical_form()
    {
        $this->withoutExceptionhandling();
        $this->signInCoach();

        Storage::fake('public');

        $this->json('POST', 'api/physicals/{physical}/physical-form', [
            'physical-form' => $file = UploadedFile::fake()->create('physical-form.pdf')
        ]);

        Storage::disk('public')->assertExists('physicals/' . $file->hashName());
    }

}
