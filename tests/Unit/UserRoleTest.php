<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Users\Role;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRoleTest extends TestCase
{
    use RefreshDatabase;

    protected $role;

    public function setUp(): void
    {
        parent::setUp();

        $this->role = factory(Role::class)->create();
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertEquals(
            '/user-roles/'.$this->role->slug, $this->role->path());
    }

    /** @test */
    public function it_has_many_users()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->role->users);
    }
}
