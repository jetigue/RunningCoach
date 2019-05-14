<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Users\Role;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageUserRolesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_user_role()
    {
        $attributes = [
            'name' => 'viewer',
        ];

        $this->post('/api/roles', $attributes);

        $this->assertDatabaseHas('user_roles', $attributes);

        $this->get('/user-roles')
            ->assertSee($attributes['name']);
    }

    /** @test */
    public function a_user_role_requires_a_name()
    {
        $attributes = factory(Role::class)->raw(['name' => '']);

        $this->post('api/roles', $attributes)->assertSessionHasErrors('name');
    }
}
