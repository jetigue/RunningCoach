<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Properties\Races\Event;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
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
            '/events/'.$this->event->id, $this->event->path());
    }

    // /** @test */
    // function it_has_many_users()
    // {
    //     $this->assertInstanceOf(
    //         'Illuminate\Database\Eloquent\Collection', $this->role->users);
    // }
}
