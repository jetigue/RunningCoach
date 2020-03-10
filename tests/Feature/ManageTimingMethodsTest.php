<?php

namespace Tests\Feature;

use App\Models\Properties\Meets\Timing;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageTimingMethodsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_timing_method()
    {
        $this->signInAdmin();

        $attributes = ['name' => 'FAT'];

        $this->post('/api/timing', $attributes);

        $this->assertDatabaseHas('timing_methods', $attributes);

        $this->get('/timing')->assertSee($attributes['name']);
    }

    /** @test */
    public function a_timing_method_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(Timing::class)->raw(['name' => '']);

        $this->post('api/timing', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_coach_cannot_create_a_timing_method()
    {
        $this->signInCoach();

        $attributes = ['name' => 'FAT'];

        $this->post('/api/timing', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_a_timing_method()
    {
        $this->signInAthlete();

        $attributes = ['name' => 'FAT'];

        $this->post('/api/timing', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_timing_method()
    {
        $this->signInViewer();

        $attributes = ['name' => 'FAT'];

        $this->post('/api/timing', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_guest_cannot_create_a_timing_method()
    {
        $attributes = ['name' => 'FAT'];

        $this->post('/api/timing', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_view_timing_methods()
    {
        $this->signInAdmin();

        $this->get('/timing')->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_timing_methods()
    {
        $this->signInCoach();

        $this->get('/timing')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_timing_methods()
    {
        $this->signInAthlete();

        $this->get('/timing')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_timing_methods()
    {
        $this->signInViewer();

        $this->get('/timing')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_timing_methods()
    {
        $this->get('/timing')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_timing_method()
    {
        $this->signInAdmin();

        $timing = factory(Timing::class)->create(['name' => 'FAT']);

        $this->patch('api/timing/'.$timing->id, ['name' => 'Hand-held'])
            ->assertStatus(200);

        $this->assertDatabaseHas('timing_methods', ['name' => 'Hand-held']);
    }

    /** @test */
    public function a_coach_cannot_update_a_timing_method()
    {
        $this->signInCoach();

        $timing = factory(Timing::class)->create(['name' => 'FAT']);

        $this->patch('api/timing/'.$timing->id, ['name' => 'Hand-held'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('timing_methods', ['name' => 'FAT']);
    }

    /** @test */
    public function an_athlete_cannot_update_a_timing_method()
    {
        $this->signInAthlete();

        $timing = factory(Timing::class)->create(['name' => 'FAT']);

        $this->patch('api/timing/'.$timing->id, ['name' => 'Hand-held'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('timing_methods', ['name' => 'FAT']);
    }

    /** @test */
    public function a_viewer_cannot_update_an_timing_method()
    {
        $this->signInViewer();

        $timing = factory(Timing::class)->create(['name' => 'FAT']);

        $this->patch('api/timing/'.$timing->id, ['name' => 'Hand-held'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('timing_methods', ['name' => 'FAT']);
    }

    /** @test */
    public function a_guest_cannot_update_an_timing_method()
    {
        $timing = factory(Timing::class)->create(['name' => 'FAT']);

        $this->patch('api/timing/'.$timing->id, ['name' => 'Hand-held'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('timing_methods', ['name' => 'FAT']);
    }
}
