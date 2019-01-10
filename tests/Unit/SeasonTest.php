<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Properties\General\Season;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeasonTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $season = factory(Season::class)->create();

        $this->assertEquals('/seasons/' . $season->id, $season->path());
    }


}