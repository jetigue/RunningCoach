<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Properties\Meets\Timing;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TimingMethodTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $timing;

    public function setUp()
    {
        parent::setUp();

        $this->timing = factory(Timing::class)->create();
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertEquals(
            '/timing/'.$this->timing->id, $this->timing->path());
    }
}
