<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Properties\Meets\Venue;
use App\Models\Properties\General\Season;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageVenuesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_venue()
    {
        $season = factory(Season::class)->create();

        $attributes = [
            'name' => $this->faker->word.' '.'Park',
            'season_id' => $season->id,
        ];

        $this->post('/api/venues', $attributes);

        $this->assertDatabaseHas('venues', $attributes);

        $this->get('/venues')
            ->assertSee($attributes['name'])
            ->assertSee($attributes['season_id']
        );
    }

    /** @test */
    public function a_venue_requires_a_name()
    {
        $attributes = factory(Venue::class)->raw(['name' => '']);

        $this->post('api/venues', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_venue_requires_a_season_id()
    {
        $attributes = factory(Venue::class)->raw(['season_id' => '']);

        $this->post('api/venues', $attributes)->assertSessionHasErrors('season_id');
    }
}
