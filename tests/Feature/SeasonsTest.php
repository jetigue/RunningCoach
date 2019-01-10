<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Properties\General\Season;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeasonsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_season()
    {
        $attributes = [
            'name' => $this->faker->word
        ];

        $this->post('/api/seasons', $attributes);

        $this->assertDatabaseHas('seasons', $attributes);

        $this->get('/seasons')
            ->assertSee($attributes['name'])
            ->assertSuccessful();
    }

     /** @test */
     public function a_season_requires_a_name()
     {
        $attributes = factory(Season::class)->raw(['name' => '']);

        $this->post('api/seasons', $attributes)->assertSessionHasErrors('name');
     }

}
