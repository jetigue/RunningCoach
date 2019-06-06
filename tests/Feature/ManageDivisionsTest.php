<?php

namespace Tests\Feature;

use App\Models\Properties\Races\Division;
use App\Models\Properties\Races\Gender;
use App\Models\Properties\Races\Level;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageDivisionsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_division()
    {
        $this->signInAdmin();

        $gender = factory(Gender::class)->create();
        $level = factory(Level::class)->create();

        $attributes = [
            'gender_id' => $gender->id,
            'level_id' => $level->id
        ];

        $this->post('/api/divisions', $attributes);

        $this->assertDatabaseHas('divisions', $attributes);

        $this->get('/divisions')
            ->assertSee($attributes['gender_id'])
            ->assertSee($attributes['level_id']);
    }

    /** @test */
    public function a_coach_cannot_create_a_division()
    {

        $this->signInCoach();

        $gender = factory(Gender::class)->create();
        $level = factory(Level::class)->create();

        $attributes = [
            'gender_id' => $gender->id,
            'level_id' => $level->id
        ];

        $this->post('/api/divisions', $attributes)->assertRedirect('/');

        $this->assertDatabaseMissing('divisions', $attributes);

        $this->get('/divisions')
            ->assertDontSee($attributes['gender_id'])
            ->assertDontSee($attributes['level_id']);
    }

    /** @test */
    public function an_athlete_cannot_create_a_division()
    {
        $this->signInAthlete();

        $gender = factory(Gender::class)->create();
        $level = factory(Level::class)->create();

        $attributes = [
            'gender_id' => $gender->id,
            'level_id' => $level->id
        ];

        $this->post('/api/divisions', $attributes)->assertRedirect('/');

        $this->assertDatabaseMissing('divisions', $attributes);

        $this->get('/divisions')
            ->assertDontSee($attributes['gender_id'])
            ->assertDontSee($attributes['level_id']);
    }

    /** @test */
    public function a_viewer_cannot_create_a_division()
    {
        $this->signInViewer();

        $gender = factory(Gender::class)->create();
        $level = factory(Level::class)->create();

        $attributes = [
            'gender_id' => $gender->id,
            'level_id' => $level->id
        ];

        $this->post('/api/divisions', $attributes)->assertRedirect('/');

        $this->assertDatabaseMissing('divisions', $attributes);

        $this->get('/divisions')
            ->assertDontSee($attributes['gender_id'])
            ->assertDontSee($attributes['level_id']);
    }

    /** @test */
    public function a_guest_cannot_create_a_division()
    {
        $this->signInViewer();

        $gender = factory(Gender::class)->create();
        $level = factory(Level::class)->create();

        $attributes = [
            'gender_id' => $gender->id,
            'level_id' => $level->id
        ];

        $this->post('/api/divisions', $attributes)->assertRedirect('/');

        $this->assertDatabaseMissing('divisions', $attributes);

        $this->get('/divisions')
            ->assertDontSee($attributes['gender_id'])
            ->assertDontSee($attributes['level_id']);
    }

    /** @test */
    public function a_division_requires_a_gender_id()
    {
        $this->signInAdmin();

        $attributes = factory(Division::class)->raw(['gender_id' => '']);

        $this->post('api/divisions', $attributes)->assertSessionHasErrors('gender_id');
    }

    /** @test */
    public function a_division_requires_a_level_id()
    {
        $this->signInAdmin();

        $attributes = factory(Level::class)->raw(['level_id' => '']);

        $this->post('api/divisions', $attributes)->assertSessionHasErrors('level_id');
    }

    /** @test */
    public function an_admin_can_view_divisions()
    {
        $this->signInAdmin();

        $this->get('/divisions')
            ->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_divisions()
    {
        $this->signInCoach();

        Factory(Gender::class)->create(['name' => 'Girls']);
        Factory(Level::class)->create(['name' => 'Varsity']);

        $this->get('/divisions')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_divisions()
    {
        $this->signInAthlete();

        Factory(Gender::class)->create(['name' => 'Girls']);
        Factory(Level::class)->create(['name' => 'Varsity']);

        $this->get('/divisions')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_divisions()
    {
        $this->signInViewer();

        Factory(Gender::class)->create(['name' => 'Girls']);
        Factory(Level::class)->create(['name' => 'Varsity']);

        $this->get('/divisions')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_divisions()
    {
        Factory(Gender::class)->create(['name' => 'Girls']);
        Factory(Level::class)->create(['name' => 'Varsity']);

        $this->get('/divisions')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_division()
    {
        $this->signInAdmin();

        $oldGender = factory(Gender::class)->create(['name' => 'Girls']);
        $oldLevel = factory(Level::class)->create(['name' => 'Varsity']);
        $newGender = factory(Gender::class)->create(['name' => 'Boys']);
        $newLevel = factory(Level::class)->create(['name' => 'Junior Varsity']);

        $division = factory(Division::class)->create([
            'gender_id' => $oldGender->id,
            'level_id' => $oldLevel->id
        ]);

        $this->patch('api/divisions/' . $division->id, [
            'gender_id' => $newGender->id,
            'level_id' => $newLevel->id
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('divisions', [
            'gender_id' => $newGender->id,
            'level_id' => $newLevel->id
        ]);
    }

    /** @test */
    public function a_coach_cannot_update_a_division()
    {
        $this->signInCoach();

        $oldGender = factory(Gender::class)->create(['name' => 'Girls']);
        $oldLevel = factory(Level::class)->create(['name' => 'Varsity']);
        $newGender = factory(Gender::class)->create(['name' => 'Boys']);
        $newLevel = factory(Level::class)->create(['name' => 'Junior Varsity']);

        $division = factory(Division::class)->create([
            'gender_id' => $oldGender->id,
            'level_id' => $oldLevel->id
        ]);

        $this->patch('api/divisions/' . $division->id, [
            'gender_id' => $newGender->id,
            'level_id' => $newLevel->id
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('divisions', [
            'gender_id' => $oldGender->id,
            'level_id' => $oldLevel->id
        ]);
    }

    /** @test */
    public function an_athlete_cannot_update_a_division()
    {
        $this->signInAthlete();

        $oldGender = factory(Gender::class)->create(['name' => 'Girls']);
        $oldLevel = factory(Level::class)->create(['name' => 'Varsity']);
        $newGender = factory(Gender::class)->create(['name' => 'Boys']);
        $newLevel = factory(Level::class)->create(['name' => 'Junior Varsity']);

        $division = factory(Division::class)->create([
            'gender_id' => $oldGender->id,
            'level_id' => $oldLevel->id
        ]);

        $this->patch('api/divisions/' . $division->id, [
            'gender_id' => $newGender->id,
            'level_id' => $newLevel->id
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('divisions', [
            'gender_id' => $oldGender->id,
            'level_id' => $oldLevel->id
        ]);
    }

    /** @test */
    public function a_viewer_cannot_update_a_division()
    {
        $this->signInViewer();

        $oldGender = factory(Gender::class)->create(['name' => 'Girls']);
        $oldLevel = factory(Level::class)->create(['name' => 'Varsity']);
        $newGender = factory(Gender::class)->create(['name' => 'Boys']);
        $newLevel = factory(Level::class)->create(['name' => 'Junior Varsity']);

        $division = factory(Division::class)->create([
            'gender_id' => $oldGender->id,
            'level_id' => $oldLevel->id
        ]);

        $this->patch('api/divisions/' . $division->id, [
            'gender_id' => $newGender->id,
            'level_id' => $newLevel->id
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('divisions', [
            'gender_id' => $oldGender->id,
            'level_id' => $oldLevel->id
        ]);
    }

    /** @test */
    public function a_guest_cannot_update_a_division()
    {
        $oldGender = factory(Gender::class)->create(['name' => 'Girls']);
        $oldLevel = factory(Level::class)->create(['name' => 'Varsity']);
        $newGender = factory(Gender::class)->create(['name' => 'Boys']);
        $newLevel = factory(Level::class)->create(['name' => 'Junior Varsity']);

        $division = factory(Division::class)->create([
            'gender_id' => $oldGender->id,
            'level_id' => $oldLevel->id
        ]);

        $this->patch('api/divisions/' . $division->id, [
            'gender_id' => $newGender->id,
            'level_id' => $newLevel->id
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('divisions', [
            'gender_id' => $oldGender->id,
            'level_id' => $oldLevel->id
        ]);
    }
}
