<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Properties\Races\Gender;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GenderTest extends TestCase
{
    use RefreshDatabase;

    protected $gender;

    public function setUp(): void
    {
        parent::setUp();

        $this->gender = factory(Gender::class)->create();
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertEquals(
            '/genders/'.$this->gender->id, $this->gender->path());
    }

    // /** @test */
    // function it_has_many_users()
    // {
    //     $this->assertInstanceOf(
    //         'Illuminate\Database\Eloquent\Collection', $this->role->users);
    // }
}
