<?php

namespace Tests\Unit;

use App\Models\Properties\General\Season;
use Tests\TestCase;
use App\Models\Properties\Meets\CrossCountry\Venue;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CrossCountryVenueTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $venue;

    public function setUp()
    {
        parent::setUp();

        $this->venue = factory(Venue::class)->create();
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertEquals(
            '/cross-country/venues/' . $this->venue->id, $this->venue->path());
    }

    /** @test */
    function a_venue_has_many_cross_country_meets()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->venue->crossCountryMeets);
    }

}
