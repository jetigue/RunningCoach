<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Properties\Meets\Host;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
}
