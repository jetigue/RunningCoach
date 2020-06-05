<?php

namespace Tests\Feature;

use App\Models\Training\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageTrainingGroupsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_training_group()
    {
        $this->signInAdmin();

        $attributes = [
            'name' => 'Elite',
            'color' => '73000a'
        ];

        $this->post('/api/training-groups', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('training_groups', $attributes);
    }

    /** @test */
    public function a_coach_can_create_a_training_group()
    {
        $this->signInCoach();

        $attributes = [
            'name' => 'Elite',
            'color' => '73000a'
        ];

        $this->post('/api/training-groups', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('training_groups', $attributes);
    }

    /** @test */
    public function an_athlete_cannot_create_a_training_group()
    {
        $this->signInAthlete();

        $attributes = [
            'name' => 'Elite',
            'color' => '73000a'
        ];

        $this->post('/api/training-groups', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_training_group()
    {
        $this->signInViewer();

        $attributes = [
            'name' => 'Elite',
            'color' => '73000a'
        ];

        $this->post('/api/training-groups', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_training_group()
    {
        $attributes = [
            'name' => 'Elite',
            'color' => '73000a'
        ];

        $this->post('/api/training-groups', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_training_group_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(Group::class)->raw(['name' => '']);

        $this->post('api/training-groups', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_training_group_requires_a_color()
    {
        $this->signInAdmin();

        $attributes = factory(Group::class)->raw(['color' => '']);

        $this->post('api/training-groups', $attributes)->assertSessionHasErrors('color');
    }

    /** @test */
    public function an_admin_can_view_training_groups()
    {
        $this->signInAdmin();
        $this->withoutExceptionHandling();

        $this->get('/training/groups')->assertSee('name');
    }

    /** @test */
    public function a_coach_can_view_training_groups()
    {
        $this->signInCoach();

        $this->get('/training/groups')->assertSee('name');
    }

    /** @test */
    public function an_athlete_cannot_view_training_groups()
    {
        $this->signInAthlete();

        $this->get('/training/groups')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_training_groups()
    {
        $this->signInViewer();

        $this->get('/training/groups')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_training_groups()
    {
        $this->get('/training/groups')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_training_group()
    {
        $this->signInAdmin();

        $group = factory(Group::class)->create([
            'name' => 'Elite',
            'color' => '73000a'
        ]);

        $this->patch('api/training-groups/'.$group->id, [
            'name' => 'Beginner',
            'color' => 'ffffff'
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('training_groups', [
            'name' => 'Beginner',
            'color' => 'ffffff'
        ]);
    }

    /** @test */
    public function a_coach_can_update_a_training_group()
    {
        $this->signInCoach();

        $group = factory(Group::class)->create([
            'name' => 'Elite',
            'color' => '73000a'
        ]);

        $this->patch('api/training-groups/'.$group->id, [
            'name' => 'Beginner',
            'color' => 'ffffff'
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('training_groups', [
            'name' => 'Beginner',
            'color' => 'ffffff'
        ]);
    }

    /** @test */
    public function an_athlete_cannot_update_a_training_group()
    {
        $this->signInAthlete();

        $group = factory(Group::class)->create([
            'name' => 'Elite',
            'color' => '73000a'
        ]);

        $this->patch('api/training-groups/'.$group->id, [
            'name' => 'Beginner',
            'color' => 'ffffff'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('training_groups', ['name' => 'Elite']);
    }

    /** @test */
    public function a_viewer_cannot_update_a_training_group()
    {
        $this->signInViewer();

        $group = factory(Group::class)->create([
            'name' => 'Elite',
            'color' => '73000a'
        ]);

        $this->patch('api/training-groups/'.$group->id, [
            'name' => 'Beginner',
            'color' => 'ffffff'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('training_groups', ['name' => 'Elite']);
    }

    /** @test */
    public function a_guest_cannot_update_a_training_group()
    {
        $group = factory(Group::class)->create([
            'name' => 'Elite',
            'color' => '73000a'
        ]);

        $this->patch('api/training-groups/'.$group->id, [
            'name' => 'Beginner',
            'color' => 'ffffff'
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('training_groups', ['name' => 'Elite']);
    }
}
