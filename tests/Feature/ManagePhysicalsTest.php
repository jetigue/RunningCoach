<?php

namespace Tests\Feature;

use App\Models\Athlete;
use App\Models\Physical;
use App\Models\Training\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ManagePhysicalsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

        protected $group;
        protected $athlete;
        protected $attributes;
        protected $newAttributes;

        public function setUp(): void
        {
            parent::setUp();

            $this->group = factory(Group::class)->create();
            $this->athlete = factory(Athlete::class)->create(['training_group_id' => $this->group->id]);

            $this->attributes = [
                'athlete_id' => $this->athlete->id,
                'consent_form' => $this->faker->boolean($chanceOfGettingTrue = 80),
                'concussion_form' => $this->faker->boolean($chanceOfGettingTrue = 80),
                'evaluation_form' => $this->faker->boolean($chanceOfGettingTrue = 80),
                'exam_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                ];
        }

    /** @test */
    public function a_coach_can_enter_a_physical()
    {
        $this->withExceptionHandling();
        $this->signInCoach();

        $this->post('/api/physicals', $this->attributes);

        $this->assertDatabaseHas('physicals', $this->attributes);

        $this->get('/physicals')
            ->assertSee($this->attributes['athlete_id'])
            ->assertSee($this->attributes['exam_date']);
    }

    /** @test */
    public function only_a_user_can_upload_a_physical()
    {
        $this->withExceptionhandling();

        $this->json('POST', '/api/physicals/{physical}/physical-form')
            ->assertStatus(401);
    }

//    /** @test */
//    public function a_valid_physical_form_must_be_provided()
//    {
//        $this->withoutExceptionhandling()->signInCoach();
//
//        $this->json('POST', '/api/physicals/{physical}/physical-form', [
//            'physical-form' => 'not-a-file'
//        ])->assertStatus(422);
//    }
//
//    /** @test */
//    public function a_coach_can_upload_a_physical_form()
//    {
//        $this->withoutExceptionhandling();
//        $this->signInCoach();
//
//        Storage::fake('public');
//
//        $this->json('POST', 'api/physicals/{physical}/physical-form', [
//            'physical-form' => $file = UploadedFile::fake()->create('physical-form.pdf')
//        ]);
//
//        Storage::disk('public')->assertExists('physicals/' . $file->hashName());
//    }
}
