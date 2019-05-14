<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Str;
use App\Models\Properties\General\Season;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageSeasonsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_season()
    {
        $name = 'Cross Country';

        $attributes = [
            'name' => $name,
            'slug' => Str::slug($name),
        ];

        $this->post('/api/seasons', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('seasons', $attributes);

        $this->get('/seasons')
            ->assertSee($attributes['name']);
    }

    /** @test */
    public function a_season_requires_a_name()
    {
        $attributes = factory(Season::class)->raw(['name' => '']);

        $this->post('api/seasons', $attributes)->assertSessionHasErrors('name');
    }
}
