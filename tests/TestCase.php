<?php

namespace Tests;

use App\Models\Users\Role;
use App\Models\Users\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Sign in an Administrator.
     *
     * @param null $user
     */
    protected function signInAdmin($user = null)
    {
        $role = factory(Role::class)->states('admin')->create();

        $this->actingAs($user ?: factory(User::class)->create(['user_role_id' => $role->id]));
    }

    /**
     * Sign in a Coach.
     *
     * @param null $user
     */
    protected function signInCoach($user = null)
    {
        $role = factory(Role::class)->states('coach')->create();

        $this->actingAs($user ?: factory(User::class)->create(['user_role_id' => $role->id]));
    }

    /**
     * Sign in an Athlete.
     *
     * @param null $user
     */
    protected function signInAthlete($user = null)
    {
        $role = factory(Role::class)->states('athlete')->create();

        $this->actingAs($user ?: factory(User::class)->create(['user_role_id' => $role->id]));
    }

    /**
     * Sign in a Viewer.
     *
     * @param null $user
     */
    protected function signInViewer($user = null)
    {
        $role = factory(Role::class)->states('viewer')->create();

        $this->actingAs($user ?: factory(User::class)->create(['user_role_id' => $role->id]));
    }
}
