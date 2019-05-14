<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Properties\Meets\Venue;
use App\Models\Properties\General\Season;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VenueTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $venue;

    public function setUp(): void
    {
        parent::setUp();

        $season = factory(Season::class)->create();

        $this->venue = factory(Venue::class)->create(['season_id' => $season->id]);
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertEquals(
            '/venues/'.$this->venue->id, $this->venue->path());
    }

    /** @test */
    public function a_venue_belongs_to_a_season()
    {
        $this->assertInstanceOf(Season::class, $this->venue->season);
    }
}
