<?php

namespace Tests\Feature;

use App\Models\Users\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageUserRolesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_user_role()
    {
        $this->signInAdmin();

        $attributes = ['name' => 'Viewer'];

        $this->post('/api/user-roles', $attributes);

        $this->assertDatabaseHas('user_roles', $attributes);

        $this->get('/user-roles')->assertSee($attributes['name']);
    }

    /** @test */
    public function a_user_role_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(Role::class)->raw(['name' => '']);

        $this->post('api/user-roles', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_coach_cannot_create_a_user_role()
    {
        $this->signInCoach();

        $attributes = ['name' => 'Viewer'];

        $this->post('/api/user-roles', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_a_user_role()
    {
        $this->signInAthlete();

        $attributes = ['name' => 'Viewer'];

        $this->post('/api/user-roles', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_user_role()
    {
        $this->signInViewer();

        $attributes = ['name' => 'Viewer'];

        $this->post('/api/user-roles', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_user_role()
    {
        $attributes = ['name' => 'Viewer'];

        $this->post('/api/user-roles', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_view_user_roles()
    {
        $this->signInAdmin();

        $this->get('/user-roles')->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_can_view_user_roles()
    {
        $this->signInCoach();

        $this->get('/user-roles')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_can_view_user_roles()
    {
        $this->signInAthlete();

        $this->get('/user-roles')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_can_view_user_roles()
    {
        $this->signInViewer();

        $this->get('/user-roles')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_can_view_user_roles()
    {
        $this->get('/user-roles')->assertRedirect('/');
    }

    /** @test */
//    public function an_admin_can_update_a_role()
//    {
//
//        $this->signInAdmin();
//
//        $role = factory(Role::class)->create(['name' => 'admin']);
//
//        $this->patch('api/user-roles/' . $role->id, ['name' => 'Athlete'])
//            ->assertStatus(200);
//
//        $this->assertDatabaseHas('user_roles', [
//            'name' => 'Athlete'
//        ]);
//    }

    /** @test */
    public function a_coach_cannot_update_a_role()
    {
        $this->signInCoach();

        $role = factory(Role::class)->create(['name' => 'Viewer']);

        $this->patch('api/user-roles/' . $role->id, ['name' => 'Athlete'])
            ->assertRedirect('/');;

        $this->assertDatabaseHas('user_roles', ['name' => 'Viewer']);
    }

    /** @test */
    public function an_athlete_cannot_update_a_role()
    {
        $this->signInAthlete();

        $role = factory(Role::class)->create(['name' => 'Viewer']);

        $this->patch('api/user-roles/' . $role->id, ['name' => 'Athlete'])
            ->assertRedirect('/');;

        $this->assertDatabaseHas('user_roles', ['name' => 'Viewer']);
    }

    /** @test */
    public function a_viewer_cannot_update_an_role()
    {
        $this->signInViewer();

        $role = factory(Role::class)->create(['name' => 'Athlete']);

        $this->patch('api/user-roles/' . $role->id, ['name' => 'Coach'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('user_roles', ['name' => 'Athlete']);
    }

    /** @test */
    public function a_guest_cannot_update_an_role()
    {
        $role = factory(Role::class)->create(['name' => 'Viewer']);

        $this->patch('api/user-roles/' . $role->id, ['name' => 'Athlete'])
            ->assertRedirect('/');;

        $this->assertDatabaseHas('user_roles', ['name' => 'Viewer']);
    }
}
