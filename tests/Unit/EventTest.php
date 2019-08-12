<?php

namespace Tests\Unit;

use App\Models\Results\Track\Result;
use App\Models\Results\Track\TeamResult;
use Tests\TestCase;
use App\Models\Properties\Races\TrackEvent;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    protected $event;

    public function setUp()
    {
        parent::setUp();

        $this->event = factory(TrackEvent::class)->create();
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertEquals(
            '/events/' . $this->event->slug, $this->event->path());
    }

    public function an_event_has_many_track_results()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->event->trackResults
        );
    }

}
