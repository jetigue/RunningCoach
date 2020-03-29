<?php

namespace Tests\Unit;

use App\Models\Properties\Meets\Track\Name;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TrackMeetNameTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $name;

    protected function setUp(): void
    {
        parent::setUp();

        $this->name = factory(Name::class)->create();
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertEquals(
            '/track/meet-names/'.$this->name->id, $this->name->path());
    }


    /** @test */
    public function a_meet_name_has_many_track_meets()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->name->trackMeets
        );
    }
}
