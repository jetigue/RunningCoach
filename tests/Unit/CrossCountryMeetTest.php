<?php

namespace Tests\Unit;

use App\Models\Meets\CrossCountryMeet;
use App\Models\Properties\Meets\Host;
use App\Models\Properties\Meets\CrossCountry\Name;
use App\Models\Properties\Meets\Timing;
use App\Models\Properties\Meets\CrossCountry\Venue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Setup\TrackMeetFactory;
use Tests\TestCase;

class CrossCountryMeetTest extends TestCase
{
    use RefreshDatabase;

    protected $crossCountryMeet;

    protected function setUp(): void
    {
        parent::setUp();

        $meetName = factory(Name::class)->create();
        $venue = factory(Venue::class)->create();
        $host = factory(Host::class)->create();
        $timing = factory(Timing::class)->create();

        $this->crossCountryMeet = factory(CrossCountryMeet::class)->create([
            'cross_country_meet_name_id' => $meetName->id,
            'cross_country_venue_id' => $venue->id,
            'host_id' => $host->id,
            'timing_method_id' => $timing->id,
        ]);
    }

    /** @test */
    public function a_cross_country_meet_belongs_to_a_host()
    {
        $this->assertInstanceOf(Host::class, $this->crossCountryMeet->host);
    }

    /** @test */
    public function a_cross_country_meet_belongs_to_a_meet_name()
    {
        $this->assertInstanceOf(Name::class, $this->crossCountryMeet->name);
    }

    /** @test */
    public function a_cross_country_meet_belongs_to_a_timing_method()
    {
        $this->assertInstanceOf(Timing::class, $this->crossCountryMeet->timing);
    }

    /** @test */
    public function a_cross_country_meet_belongs_to_a_venue()
    {
        $this->assertInstanceOf(Venue::class, $this->crossCountryMeet->venue);
    }
}
