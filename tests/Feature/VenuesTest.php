<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Properties\Meets\Venue;

class VenuesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_venue()
    {
        $attributes = [
            'name' => $this->faker->word,
            'season_id' => 1
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
