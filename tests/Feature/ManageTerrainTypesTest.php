<?php

namespace Tests\Feature;

use App\Models\Properties\General\TerrainType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageTerrainTypesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_a_terrain_type()
    {
        $this->signInAdmin();

        $attributes = [
            'name' => 'Trail',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/terrain-types', $attributes)->assertStatus(201);

        $this->assertDatabaseHas('terrain_types', $attributes);
    }

    /** @test */
    public function a_coach_cannot_create_a_terrain_type()
    {
        $this->signInCoach();

        $attributes = [
            'name' => 'Easy Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/terrain-types', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_create_a_terrain_type()
    {
        $this->signInAthlete();

        $attributes = [
            'name' => 'Easy Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/terrain-types', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_a_terrain_type()
    {
        $this->signInViewer();

        $attributes = [
            'name' => 'Easy Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/terrain-types', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_a_terrain_type()
    {
        $attributes = [
            'name' => 'Easy Run',
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/terrain-types', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_terrain_type_requires_a_name()
    {
        $this->signInAdmin();

        $attributes = factory(TerrainType::class)->raw(['name' => '']);

        $this->post('api/terrain-types', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_terrain_type_requires_a_description()
    {
        $this->signInAdmin();

        $attributes = factory(TerrainType::class)->raw(['description' => '']);

        $this->post('api/terrain-types', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */
    public function an_admin_can_view_terrain_types()
    {
        $this->signInAdmin();

        $this->get('/terrain-types')->assertSee('name');
    }

    /** @test */
    public function a_coach_cannot_view_terrain_types()
    {
        $this->signInCoach();

        $this->get('/terrain-types')->assertRedirect('/');
    }

    /** @test */
    public function an_athlete_cannot_view_terrain_types()
    {
        $this->signInAthlete();

        $this->get('/terrain-types')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_terrain_types()
    {
        $this->signInViewer();

        $this->get('/terrain-types')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_terrain_types()
    {
        $this->get('/terrain-types')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_a_terrain_type()
    {
        $this->signInAdmin();

        $terrainType = factory(TerrainType::class)->create([
            'name' => 'Asphalt',
            'description' => 'Original Description',
        ]);

        $this->patch('api/terrain-types/'.$terrainType->id, [
            'name' => 'Grass',
            'description' => 'New Description',
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('terrain_types', [
            'name' => 'Grass',
            'description' =>'New Description',
        ]);
    }

    /** @test */
    public function a_coach_cannot_update_a_terrain_type()
    {
        $this->signInCoach();

        $terrainType = factory(TerrainType::class)->create([
            'name' => 'Asphalt',
            'description' => 'Original Description',
        ]);

        $this->patch('api/terrain-types/'.$terrainType->id, [
            'name' => 'Grass',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('terrain_types', ['name' => 'Asphalt']);
    }

    /** @test */
    public function an_athlete_cannot_update_a_terrain_type()
    {
        $this->signInAthlete();

        $terrainType = factory(TerrainType::class)->create([
            'name' => 'Asphalt',
            'description' => 'Original Description',
        ]);

        $this->patch('api/terrain-types/'.$terrainType->id, [
            'name' => 'Grass',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('terrain_types', ['name' => 'Asphalt']);
    }

    /** @test */
    public function a_viewer_cannot_update_a_terrain_type()
    {
        $this->signInViewer();

        $terrainType = factory(TerrainType::class)->create([
            'name' => 'Asphalt',
            'description' => 'Original Description',
        ]);

        $this->patch('api/terrain-types/'.$terrainType->id, [
            'name' => 'Grass',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('terrain_types', ['name' => 'Asphalt']);
    }

    /** @test */
    public function a_guest_cannot_update_a_terrain_type()
    {
        $terrainType = factory(TerrainType::class)->create([
            'name' => 'Asphalt',
            'description' => 'Original Description',
        ]);

        $this->patch('api/terrain-types/'.$terrainType->id, [
            'name' => 'Grass',
            'description' => 'New Description',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('terrain_types', ['name' => 'Asphalt']);
    }
}
