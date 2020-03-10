<?php

namespace Tests\Unit;

use App\Models\Properties\Races\Gender;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GenderTest extends TestCase
{
    use RefreshDatabase;

    protected $gender;

    public function setUp()
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

    /** @test */
    public function a_gender_has_many_divisions()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->gender->divisions
        );
    }
}
