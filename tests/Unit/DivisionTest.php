<?php

namespace Tests\Unit;

use App\Models\Properties\Races\Gender;
use App\Models\Properties\Races\Level;
use App\Models\Properties\Races\Division;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DivisionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $division;

    public function setUp()
    {
        parent::setUp();

        $gender = factory(Gender::class)->create();
        $level = factory(Level::class)->create();

        $this->division = factory(Division::class)->create([
            'gender_id' => $gender->id,
            'level_id' => $level->id
        ]);
    }

    /** @test */
    function a_division_belongs_to_a_gender()
    {
        $this->assertInstanceOf(Gender::class, $this->division->gender);
    }

    /** @test */
    function a_division_belongs_to_a_level()
    {
        $this->assertInstanceOf(Level::class, $this->division->level);
    }

    /** @test */
    function a_division_has_many_track_team_results()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->division->trackTeamResults
        );
    }

}
