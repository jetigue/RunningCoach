<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Properties\Meets\Host;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageHostsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_host()
    {
        $name = 'Lambert High School';

        $attributes = [
            'name' => $name,
        ];

        $this->post('/api/hosts', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('hosts', $attributes);

        $this->get('/hosts')
            ->assertSee($attributes['name']);
    }

     /** @test */
     public function a_host_requires_a_name()
     {
        $attributes = factory(Host::class)->raw(['name' => '']);

        $this->post('api/hosts', $attributes)->assertSessionHasErrors('name');
     }
}
