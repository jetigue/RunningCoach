<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Properties\Races\Event;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageEventsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_an_event()
    {
        $name = '3200m';

        $attributes = [
            'name' => $name,
            'meters' => 3200,
        ];

        $this->post('/api/events', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('events', $attributes);

        $this->get('/events')
            ->assertSee($attributes['name'])
            ->assertSee($attributes['meters']);
    }

    /** @test */
    public function an_event_requires_a_name()
    {
        $attributes = factory(Event::class)->raw(['name' => '']);

        $this->post('api/events', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function an_event_requires_a_distance_in_meters()
    {
        $attributes = factory(Event::class)->raw(['meters' => '']);

        $this->post('api/events', $attributes)->assertSessionHasErrors('meters');
    }
}
