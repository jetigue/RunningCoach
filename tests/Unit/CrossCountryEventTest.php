<?php

namespace Tests\Unit;

use App\Models\Results\CrossCountry\Result;
use App\Models\Results\CrossCountry\TeamResult;
use Tests\TestCase;
use App\Models\Properties\Races\CrossCountry\Event;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CrossCountryEventTest extends TestCase
{
    use RefreshDatabase;

    protected $event;

    public function setUp()
    {
        parent::setUp();

        $this->event = factory(Event::class)->create();
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertEquals(
            '/cross-country-events/' . $this->event->slug, $this->event->path());
    }

    /** @test */
    public function an_event_has_many_cross_country_team_results()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->event->crossCountryTeamResults
        );
    }

    /** @test */
    public function an_event_has_many_cross_country_results()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->event->crossCountryResults
        );
    }

}