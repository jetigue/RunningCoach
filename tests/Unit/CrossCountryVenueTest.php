<?php

namespace Tests\Unit;

use App\Models\Properties\General\Season;
use App\Models\Properties\Meets\CrossCountry\Venue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrossCountryVenueTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $venue;

    protected function setUp(): void
    {
        parent::setUp();

        $this->venue = factory(Venue::class)->create();
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertEquals(
            '/cross-country/venues/'.$this->venue->id, $this->venue->path());
    }

    /** @test */
    public function a_venue_has_many_cross_country_meets()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->venue->crossCountryMeets);
    }
}
