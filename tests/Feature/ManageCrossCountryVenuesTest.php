<?php

namespace Tests\Feature;

use App\Models\Properties\Meets\CrossCountry\Venue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageCrossCountryVenuesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_cross_country_venue()
    {
        $this->signInAdmin();

        $attributes = [
            'name' => $this->faker->word.' '.'Park',
        ];

        $this->post('/api/cross-country/venues', $attributes);

        $this->assertDatabaseHas('cross_country_venues', $attributes);

        $this->get('/cross-country/venues')
            ->assertSee($attributes['name']
        );
    }

    /** @test */
    public function a_coach_can_create_a_cross_country_venue()
    {
        $this->signInCoach();

        $attributes = [
            'name' => $this->faker->word.' '.'Park',
        ];

        $this->post('/api/cross-country/venues', $attributes);

        $this->assertDatabaseHas('cross_country_venues', $attributes);

        $this->get('/cross-country/venues')
            ->assertSee($attributes['name']
            );
    }

    /** @test */
    public function a_cross_country_venue_requires_a_name()
    {
        $this->signInCoach();

        $attributes = factory(Venue::class)->raw(['name' => '']);

        $this->post('api/cross-country/venues', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function an_athlete_cannot_create_a_cross_country_venue()
    {
        $this->signInAthlete();

        $attributes = [
            'name' => $this->faker->word.' '.'Park',
        ];

        $this->post('/api/cross-country/venues', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_cross_country_venue()
    {
        $this->signInViewer();

        $attributes = [
            'name' => $this->faker->word.' '.'Park',
        ];

        $this->post('/api/cross-country/venues', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_cross_country_venue()
    {
        $attributes = [
            'name' => $this->faker->word.' '.'Park',
        ];

        $this->post('/api/cross-country/venues', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_view_venues()
    {
        $this->signInAdmin();

        $this->get('/cross-country/venues')->assertSee('name');
    }

    /** @test */
    public function a_coach_can_view_venues()
    {
        $this->signInCoach();

        $this->get('/cross-country/venues')->assertSee('name');
    }

    /** @test */
    public function an_athlete_cannot_view_venues()
    {
        $this->signInAthlete();

        $this->get('/cross-country/venues')->assertRedirect('/');
    }

    /** @test */
    public function an_viewer_cannot_view_venues()
    {
        $this->signInViewer();

        $this->get('/cross-country/venues')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_venues()
    {
        $this->get('/cross-country/venues')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_cross_country_venue()
    {
        $this->signInAdmin();

        $name = factory(Venue::class)->create([
            'name' => 'Original Meet Venue',
        ]);

        $this->patch('api/cross-country/venues/'.$name->id, [
        'name' => 'New Meet Venue',
    ])
            ->assertStatus(200);

        $this->assertDatabaseHas('cross_country_venues', [
            'name' => 'New Meet Venue',
        ]);
    }

    /** @test */
    public function a_coach_can_update_a_cross_country_venue()
    {
        $this->signInCoach();

        $name = factory(Venue::class)->create([
            'name' => 'Original Meet Venue',
        ]);

        $this->patch('api/cross-country/venues/'.$name->id, [
            'name' => 'New Meet Venue',
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('cross_country_venues', [
            'name' => 'New Meet Venue',
        ]);
    }

    /** @test */
    public function an_athlete_cannot_update_a_cross_country_venue()
    {
        $this->signInAthlete();

        $name = factory(Venue::class)->create([
            'name' => 'Original Meet Venue',
        ]);

        $this->patch('api/cross-country/venues/'.$name->id, [
            'name' => 'New Meet Venue',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('cross_country_venues', ['name' => 'Original Meet Venue']);
    }

    /** @test */
    public function a_viewer_cannot_update_a_cross_country_venue()
    {
        $this->signInViewer();

        $name = factory(Venue::class)->create([
            'name' => 'Original Meet Venue',
        ]);

        $this->patch('api/cross-country/venues/'.$name->id, [
            'name' => 'New Meet Venue',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('cross_country_venues', ['name' => 'Original Meet Venue']);
    }

    /** @test */
    public function a_guest_cannot_update_a_cross_country_venue()
    {
        $name = factory(Venue::class)->create([
            'name' => 'Original Meet Venue',
        ]);

        $this->patch('api/cross-country/venues/'.$name->id, [
            'name' => 'New Meet Venue',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('cross_country_venues', ['name' => 'Original Meet Venue']);
    }
}
