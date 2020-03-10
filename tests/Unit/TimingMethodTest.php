<?php

namespace Tests\Unit;

use App\Models\Properties\Meets\Timing;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TimingMethodTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $timing;

    protected function setUp(): void
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

    /** @test */
    public function a_timing_method_has_many_track_meets()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->timing->trackMeets);
    }
}
