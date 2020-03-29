<?php

namespace Tests\Feature;

use App\Models\Properties\Races\Division;
use App\Models\Properties\Races\Gender;
use App\Models\Properties\Races\Level;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageDivisionsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    protected $gender;
    protected $level;
    protected $newGender;
    protected $newLevel;
    protected $attributes;
    protected $newAttributes;
    protected $division;


    public function setUp(): void
    {
        parent::setUp();

        $this->gender = factory(Gender::class)->create(['name' => 'Girls']);
        $this->level = factory(Level::class)->create(['name' => 'Varsity']);

        $this->newGender = factory(Gender::class)->create(['name' => 'Boys']);
        $this->newLevel = factory(Level::class)->create(['name' => 'Junior Varsity']);

        $this->attributes = [
            'gender_id' => $this->gender->id,
            'level_id' => $this->level->id,
        ];

        $this->newAttributes = [
            'gender_id' => $this->newGender->id,
            'level_id' => $this->newLevel->id,
        ];
    }

    /** @test */
    public function an_admin_can_create_a_division()
    {
        $this->signInAdmin();

        $this->post('/api/divisions', $this->attributes);

        $this->assertDatabaseHas('divisions', $this->attributes);

        $this->get('/divisions')
            ->assertSee($this->attributes['gender_id'])
            ->assertSee($this->attributes['level_id']);
    }

    /** @test */
    public function a_coach_cannot_create_a_division()
    {
        $this->signInCoach();

        $this->post('/api/divisions', $this->attributes);

        $this->post('/api/divisions', $this->attributes)->assertRedirect('/');

        $this->assertDatabaseMissing('divisions', $this->attributes);

        $this->get('/divisions')
            ->assertDontSee($this->attributes['gender_id'])
            ->assertDontSee($this->attributes['level_id']);
    }

    /** @test */
    public function an_athlete_cannot_create_a_division()
    {
        $this->signInAthlete();

        $this->post('/api/divisions', $this->attributes);

        $this->post('/api/divisions', $this->attributes)->assertRedirect('/');

        $this->assertDatabaseMissing('divisions', $this->attributes);

        $this->get('/divisions')
            ->assertDontSee($this->attributes['gender_id'])
            ->assertDontSee($this->attributes['level_id']);
    }

    /** @test */
    public function a_viewer_cannot_create_a_division()
    {
        $this->signInViewer();

        $this->post('/api/divisions', $this->attributes);

        $this->post('/api/divisions', $this->attributes)->assertRedirect('/');

        $this->assertDatabaseMissing('divisions', $this->attributes);

        $this->get('/divisions')
            ->assertDontSee($this->attributes['gender_id'])
            ->assertDontSee($this->attributes['level_id']);
    }

    /** @test */
    public function a_guest_cannot_create_a_division()
    {
        $this->post('/api/divisions', $this->attributes);

        $this->post('/api/divisions', $this->attributes)->assertRedirect('/');

        $this->assertDatabaseMissing('divisions', $this->attributes);

        $this->get('/divisions')
            ->assertDontSee($this->attributes['gender_id'])
            ->assertDontSee($this->attributes['level_id']);
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

        $this->get('/divisions')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_divisions()
    {
        $this->signInAthlete();

        $this->get('/divisions')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_divisions()
    {
        $this->signInViewer();

        $this->get('/divisions')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_divisions()
    {
        $this->get('/divisions')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_division()
    {
        $this->signInAdmin();

        $division = factory(Division::class)->create($this->attributes);

        $this->patch('/api/divisions/'. $division->id, $this->newAttributes)
            ->assertStatus(200);

        $this->assertDatabaseHas('divisions', $this->newAttributes);
    }

    /** @test */
    public function a_coach_cannot_update_a_division()
    {
        $this->signInCoach();

        $division = factory(Division::class)->create($this->attributes);

        $this->patch('/api/divisions/'. $division->id, $this->newAttributes)
            ->assertRedirect('/');

        $this->assertDatabaseHas('divisions', $this->attributes);
    }

    /** @test */
    public function an_athlete_cannot_update_a_division()
    {
        $this->signInAthlete();

        $division = factory(Division::class)->create($this->attributes);

        $this->patch('/api/divisions/' . $division->id, $this->newAttributes)
            ->assertRedirect('/');

        $this->assertDatabaseHas('divisions', $this->attributes);
    }

    /** @test */
    public function a_viewer_cannot_update_a_division()
    {
        $this->signInViewer();

        $division = factory(Division::class)->create($this->attributes);

        $this->patch('/api/divisions/'. $division->id, $this->newAttributes)
            ->assertRedirect('/');

        $this->assertDatabaseHas('divisions', $this->attributes);
    }

    /** @test */
    public function a_guest_cannot_update_a_division()
    {
        $division = factory(Division::class)->create($this->attributes);

        $this->patch('/api/divisions/'. $division->id, $this->newAttributes)
            ->assertRedirect('/');

        $this->assertDatabaseHas('divisions', $this->attributes);
    }
}
