<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Properties\Meets\Timing;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageTimingMethodsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_timing_method()
    {
        $attributes = [
            'name' => 'FAT',
        ];

        $this->post('/api/timing', $attributes);

        $this->assertDatabaseHas('timing_methods', $attributes);

        $this->get('/timing')
            ->assertSee($attributes['name']);
    }

    /** @test */
    public function a_timing_method_requires_a_name()
    {
        $attributes = factory(Timing::class)->raw(['name' => '']);

        $this->post('api/timing', $attributes)->assertSessionHasErrors('name');
    }
}
