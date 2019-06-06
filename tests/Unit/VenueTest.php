<?php

namespace Tests\Unit;

use App\Models\Properties\General\Season;
use Tests\TestCase;
use App\Models\Properties\Meets\Venue;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VenueTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $venue;

    public function setUp()
    {
        parent::setUp();

        $season = factory(Season::class)->create();

        $this->venue = factory(Venue::class)->create(['season_id' => $season->id]);
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertEquals(
            '/venues/' . $this->venue->id, $this->venue->path());
    }

     /** @test */
     function a_venue_belongs_to_a_season()
     {
         $this->assertInstanceOf(Season::class, $this->venue->season);
     }

    /** @test */
    function a_venue_has_many_track_meets()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->venue->trackMeets);
    }

}