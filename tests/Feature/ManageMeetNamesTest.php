<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\General\Season;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageMeetNamesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_meet_name()
    {
        $season = factory(Season::class)->create();

        $attributes = [
            'name' => $this->faker->word.' '.'Park',
            'season_id' => $season->id,
        ];

        $this->post('/api/meetNames', $attributes);

        $this->assertDatabaseHas('meet_names', $attributes);

        $this->get('/meet-names')
            ->assertSee($attributes['name'])
            ->assertSee($attributes['season_id']);
    }

    /** @test */
    public function a_meet_name_requires_a_name()
    {
        $attributes = factory(Name::class)->raw(['name' => '']);

        $this->post('api/meetNames', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_meet_name_requires_a_season_id()
    {
        $attributes = factory(Name::class)->raw(['season_id' => '']);

        $this->post('api/meetNames', $attributes)->assertSessionHasErrors('season_id');
    }
}
