<?php

namespace Tests\Feature;

use App\Models\Properties\Meets\Host;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageHostsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_coach_can_create_a_host()
    {
        $this->signInCoach();

        $attributes = ['name' => 'The Host with the Most'];

        $this->post('/api/hosts', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('hosts', $attributes);

        $this->get('/hosts')
            ->assertSee($attributes['name']);
    }

    /** @test */
    public function an_admin_can_create_a_host()
    {
        $this->signInAdmin();

        $attributes = ['name' => 'The Hosts with the Most'];

        $this->post('/api/hosts', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('hosts', $attributes);

        $this->get('/hosts')->assertSee($attributes['name']);
    }

    /** @test */
    public function a_host_requires_a_name()
    {
        $this->signInCoach();

        $attributes = factory(Host::class)->raw(['name' => '']);

        $this->post('api/hosts', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function an_athlete_cannot_create_a_host()
    {
        $this->signInAthlete();

        $attributes = ['name' => 'The Host with the Most'];

        $this->post('/api/hosts', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_host()
    {
        $this->signInViewer();

        $attributes = ['name' => 'The Host with the Most'];

        $this->post('/api/hosts', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_host()
    {
        $attributes = ['name' => 'The Host with the Most'];

        $this->post('/api/hosts', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_view_hosts()
    {
        $this->signInAdmin();

        $this->get('/hosts')->assertSee('name');
    }

    /** @test */
    public function a_coach_can_view_hosts()
    {
        $this->signInCoach();

        $this->get('/hosts')->assertSee('name');
    }

    /** @test */
    public function an_athlete_cannot_view_hosts()
    {
        $this->signInAthlete();

        $this->get('/hosts')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_hosts()
    {
        $this->signInViewer();

        $this->get('/hosts')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_hosts()
    {
        $this->get('/hosts')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_host()
    {
        $this->signInAdmin();

        $host = factory(Host::class)->create(['name' => 'Original Meet Host']);

        $this->patch('api/hosts/'.$host->id, ['name' => 'New Meet Host'])
            ->assertStatus(200);

        $this->assertDatabaseHas('hosts', [
            'name' => 'New Meet Host',
        ]);
    }

    /** @test */
    public function a_coach_can_update_a_host()
    {
        $this->signInCoach();

        $host = factory(Host::class)->create(['name' => 'Original Meet Host']);

        $this->patch('api/hosts/'.$host->id, ['name' => 'New Meet Host'])
            ->assertStatus(200);

        $this->assertDatabaseHas('hosts', [
            'name' => 'New Meet Host',
        ]);
    }

    /** @test */
    public function an_athlete_cannot_update_a_host()
    {
        $this->signInAthlete();

        $host = factory(Host::class)->create(['name' => 'Original Meet Host']);

        $this->patch('api/hosts/'.$host->id, ['name' => 'New Meet Host'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('hosts', ['name' => 'Original Meet Host']);
    }

    /** @test */
    public function a_viewer_cannot_update_an_host()
    {
        $this->signInViewer();

        $host = factory(Host::class)->create(['name' => 'Original Meet Host']);

        $this->patch('api/hosts/'.$host->id, ['name' => 'New Meet Host'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('hosts', ['name' => 'Original Meet Host']);
    }

    /** @test */
    public function a_guest_cannot_update_an_host()
    {
        $host = factory(Host::class)->create(['name' => 'Original Meet Host']);

        $this->patch('api/hosts/'.$host->id, ['name' => 'New Meet Host'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('hosts', ['name' => 'Original Meet Host']);
    }
}
