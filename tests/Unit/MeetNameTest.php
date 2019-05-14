<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\General\Season;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MeetNameTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $name;

    public function setUp(): void
    {
        parent::setUp();

        $season = factory(Season::class)->create();

        $this->name = factory(Name::class)->create(['season_id' => $season->id]);
    }

    /** @test */
    public function it_has_a_path()
    {
        $this->assertEquals(
            '/meet-names/'.$this->name->id, $this->name->path());
    }

    /** @test */
    public function a_meet_name_belongs_to_a_season()
    {
        $this->assertInstanceOf(Season::class, $this->name->season);
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
