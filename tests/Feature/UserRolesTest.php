<?php

namespace Tests\Feature;

use App\Models\Users\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRolesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_user_role()
    {
        $attributes = [
            'name' => $this->faker->word
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
