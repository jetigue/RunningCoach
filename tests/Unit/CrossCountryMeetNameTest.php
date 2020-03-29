<?php

namespace Tests\Unit;

use App\Models\Properties\Meets\CrossCountry\Name;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrossCountryMeetNameTest extends TestCase
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
            '/cross-country/meet-names/'.$this->name->id, $this->name->path());
    }


    /** @test */
    public function a_meet_name_has_many_track_meets()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->name->crossCountryMeets
        );
    }
}
