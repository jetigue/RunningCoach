<?php

namespace Tests\Feature;

use App\Models\Users\Role;
use App\Models\Users\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageUsersTest extends TestCase
{
    use WithFaker, RefreshDatabase;


    /** @test */
    public function an_admin_can_view_users()
    {
        $this->signInAdmin();

        $this->get('/users')
            ->assertSee('first_name')
            ->assertSee('last_name')
            ->assertSee('email')
            ->assertSee('role');
    }

    /** @test */
    public function a_coach_cannot_view_users()
    {
        $this->signInCoach();

        $this->get('/users')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_users()
    {
        $this->signInAthlete();

        $this->get('/users')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_users()
    {
        $this->signInViewer();

        $this->get('/users')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_users()
    {
        $this->get('/users')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_user()
    {
        $this->signInAdmin();

        $roleViewer = factory(Role::class)->states('viewer')->create();
        $roleAthlete = factory(Role::class)->states('athlete')->create();

        $user = factory(User::class)->create([
            'first_name' => 'Original First Name',
            'last_name' => 'Original Last Name',
            'email' => 'Original@email.com',
            'user_role_id' => $roleViewer->id,
        ]);

        $this->patch('api/users/' . $user->id, [
            'first_name' => 'Different First Name',
            'last_name' => 'Different Last Name',
            'email' => 'Different@email.com',
            'user_role_id' => $roleAthlete->id
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'id' => 2,
            'first_name' => 'Different First Name',
            'last_name' => 'Different Last Name',
            'email' => 'Different@email.com',
            'user_role_id' => $roleAthlete->id
        ]);
    }

    /** @test */
    public function a_coach_cannot_update_a_user()
    {
        $this->signInCoach();

        $roleViewer = factory(Role::class)->states('viewer')->create();
        $roleAthlete = factory(Role::class)->states('athlete')->create();

        $user = factory(User::class)->create([
            'first_name' => 'Original First Name',
            'last_name' => 'Original Last Name',
            'email' => 'Original@email.com',
            'user_role_id' => $roleViewer->id,
        ]);

        $this->patch('api/users/' . $user->id, [
            'first_name' => 'Different First Name',
            'last_name' => 'Different Last Name',
            'email' => 'Different@email.com',
            'user_role_id' => $roleAthlete->id
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'id' => 2,
            'first_name' => 'Original First Name',
            'last_name' => 'Original Last Name',
            'email' => 'Original@email.com',
            'user_role_id' => $roleViewer->id,
        ]);
    }

    /** @test */
    public function an_athlete_cannot_update_a_user()
    {
        $this->signInAthlete();

        $roleViewer = factory(Role::class)->states('viewer')->create();
        $roleCoach = factory(Role::class)->states('coach')->create();

        $user = factory(User::class)->create([
            'first_name' => 'Original First Name',
            'last_name' => 'Original Last Name',
            'email' => 'Original@email.com',
            'user_role_id' => $roleViewer->id,
        ]);

        $this->patch('api/users/' . $user->id, [
            'first_name' => 'Different First Name',
            'last_name' => 'Different Last Name',
            'email' => 'Different@email.com',
            'user_role_id' => $roleCoach->id
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'id' => 2,
            'first_name' => 'Original First Name',
            'last_name' => 'Original Last Name',
            'email' => 'Original@email.com',
            'user_role_id' => $roleViewer->id,
        ]);
    }

    /** @test */
    public function a_viewer_cannot_update_a_user()
    {
        $this->signInViewer();

        $roleAthlete = factory(Role::class)->states('athlete')->create();
        $roleCoach = factory(Role::class)->states('coach')->create();

        $user = factory(User::class)->create([
            'first_name' => 'Original First Name',
            'last_name' => 'Original Last Name',
            'email' => 'Original@email.com',
            'user_role_id' => $roleAthlete->id,
        ]);

        $this->patch('api/users/' . $user->id, [
            'first_name' => 'Different First Name',
            'last_name' => 'Different Last Name',
            'email' => 'Different@email.com',
            'user_role_id' => $roleCoach->id
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'id' => 2,
            'first_name' => 'Original First Name',
            'last_name' => 'Original Last Name',
            'email' => 'Original@email.com',
            'user_role_id' => $roleAthlete->id,
        ]);
    }

    /** @test */
    public function a_guest_cannot_update_a_user()
    {
        $roleViewer = factory(Role::class)->states('viewer')->create();
        $roleCoach = factory(Role::class)->states('coach')->create();

        $user = factory(User::class)->create([
            'first_name' => 'Original First Name',
            'last_name' => 'Original Last Name',
            'email' => 'Original@email.com',
            'user_role_id' => $roleViewer->id,
        ]);

        $this->patch('api/users/' . $user->id, [
            'first_name' => 'Different First Name',
            'last_name' => 'Different Last Name',
            'email' => 'Different@email.com',
            'user_role_id' => $roleCoach->id
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'first_name' => 'Original First Name',
            'last_name' => 'Original Last Name',
            'email' => 'Original@email.com',
            'user_role_id' => $roleViewer->id,
        ]);
    }
}
