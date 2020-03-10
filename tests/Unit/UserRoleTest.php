<?php

namespace Tests\Unit;

use App\Models\Users\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRoleTest extends TestCase
{
    use RefreshDatabase;

    protected $role;

    protected function setUp(): void
    {
        parent::setUp();

        $this->role = factory(Role::class)->create();
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertEquals(
            '/user-roles/'.$this->role->id, $this->role->path());
    }
}
