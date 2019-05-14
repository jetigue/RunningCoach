<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Properties\Races\Gender;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageGendersTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_gender()
    {
        $name = 'Boys';

        $attributes = [
            'name' => $name,
        ];

        $this->post('/api/genders', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('genders', $attributes);

        $this->get('/genders')
            ->assertSee($attributes['name']);
    }

    /** @test */
    public function a_gender_requires_a_name()
    {
        $attributes = factory(Gender::class)->raw(['name' => '']);

        $this->post('api/genders', $attributes)->assertSessionHasErrors('name');
    }
}
