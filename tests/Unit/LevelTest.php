<?php

namespace Tests\Unit;

use App\Models\Properties\Races\Level;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LevelTest extends TestCase
{
    use RefreshDatabase;

    protected $level;

    public function setUp()
    {
        parent::setUp();

        $this->level = factory(Level::class)->create();
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertEquals(
            '/levels/'.$this->level->id, $this->level->path());
    }

    /** @test */
    public function a_level_has_many_divisions()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->level->divisions
        );
    }
}
