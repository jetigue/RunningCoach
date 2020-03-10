<?php

namespace Tests\Unit;

use App\Models\Properties\Meets\Host;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $host;

    public function setUp()
    {
        parent::setUp();

        $this->host = factory(Host::class)->create();
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertEquals(
            '/hosts/'.$this->host->id, $this->host->path());
    }

    /** @test */
    public function a_host_has_man_track_meets()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->host->trackMeets);
    }
}
