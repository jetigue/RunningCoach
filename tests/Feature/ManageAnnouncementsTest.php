<?php

namespace Tests\Feature;

use App\Models\Team\Announcement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageAnnouncementsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_create_an_announcement()
    {
        $this->signInAdmin();

        $attributes = [
            'title' => $this->faker->sentence($nbWords = 6, $variableBbWords = true),
            'begin_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'end_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'body'  => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/announcements', $attributes);

        $this->assertDatabaseHas('announcements', $attributes);

        $this->get('/announcements')
            ->assertSee($attributes['title'])
            ->assertSee($attributes['body']);
    }

    /** @test */
    public function a_coach_can_create_an_announcement()
    {
        $this->signInCoach();

        $attributes = [
            'title' => $this->faker->sentence($nbWords = 6, $variableBbWords = true),
            'begin_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'end_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'body'  => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/announcements', $attributes);

        $this->assertDatabaseHas('announcements', $attributes);

        $this->get('/announcements')
            ->assertSee($attributes['title'])
            ->assertSee($attributes['body']);
    }

    /** @test */
    public function an_athlete_cannot_create_an_announcement()
    {
        $this->signInCoach();

        $attributes = [
            'title' => $this->faker->sentence($nbWords = 6, $variableBbWords = true),
            'begin_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'end_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'body'  => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/announcements', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_create_an_announcement()
    {
        $this->signInViewer();

        $attributes = [
            'title' => $this->faker->sentence($nbWords = 6, $variableBbWords = true),
            'begin_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'end_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'body'  => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/announcements', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_create_an_announcement()
    {
        $attributes = [
            'title' => $this->faker->sentence($nbWords = 6, $variableBbWords = true),
            'begin_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'end_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'body'  => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];

        $this->post('/api/announcements', $attributes)->assertRedirect('/');
    }

    /** @test */
    public function an_announcement_requires_a_title()
    {
        $this->signInAdmin();

        $attributes = factory(Announcement::class)->raw(['title' => '']);

        $this->post('api/announcements', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function an_announcement_requires_a_body()
    {
        $this->signInAdmin();

        $attributes = factory(Announcement::class)->raw(['body' => '']);

        $this->post('api/announcements', $attributes)->assertSessionHasErrors('body');
    }

    /** @test */
    public function an_announcement_requires_a_begin_date()
    {
        $this->signInAdmin();

        $attributes = factory(Announcement::class)->raw(['begin_date' => '']);

        $this->post('api/announcements', $attributes)->assertSessionHasErrors('begin_date');
    }

    /** @test */
    public function an_announcement_requires_an_end_date()
    {
        $this->signInAdmin();

        $attributes = factory(Announcement::class)->raw(['end_date' => '']);

        $this->post('api/announcements', $attributes)->assertSessionHasErrors('end_date');
    }

    /** @test */
    public function an_admin_can_view_announcements()
    {
        $this->signInAdmin();

        $this->get('/announcements')->assertSee('title');
    }

    /** @test */
    public function a_coach_can_view_announcements()
    {
        $this->signInCoach();

        $this->get('/announcements')->assertSee('title');
    }

    /** @test */
    public function an_athlete_cannot_view_announcements()
    {
        $this->signInAthlete();

        $this->get('/announcements')->assertRedirect('/');
    }

    /** @test */
    public function a_viewer_cannot_view_announcements()
    {
        $this->signInViewer();

        $this->get('/announcements')->assertRedirect('/');
    }

    /** @test */
    public function a_guest_cannot_view_announcements()
    {
        $this->signInAthlete();

        $this->get('/announcements')->assertRedirect('/');
    }

    /** @test */
    public function an_admin_can_update_an_announcement()
    {
        $this->signInAdmin();

        $announcement = factory(Announcement::class)->create([
            'title' => 'Old Title',
            'body' => 'Old Body',
            'begin_date' => '2019-06-25',
            'end_date' => '2019-10-10',
        ]);

        $this->patch('api/announcements/'.$announcement->id, [
            'title' => 'newTitle',
            'body' => 'newBody',
            'begin_date' => '1975-06-25',
            'end_date' => '1975-10-10',
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('announcements', [
            'title' => 'newTitle',
            'body' => 'newBody',
            'begin_date' => '1975-06-25',
            'end_date' => '1975-10-10',
        ]);
    }

    /** @test */
    public function a_coach_can_update_an_announcement()
    {
        $this->signInCoach();

        $announcement = factory(Announcement::class)->create([
            'title' => 'Old Title',
            'body' => 'Old Body',
            'begin_date' => '2019-06-25',
            'end_date' => '2019-10-10',
        ]);

        $this->patch('api/announcements/'.$announcement->id, [
            'title' => 'newTitle',
            'body' => 'newBody',
            'begin_date' => '1975-06-25',
            'end_date' => '1975-10-10',
        ])
            ->assertStatus(200);

        $this->assertDatabaseHas('announcements', [
            'title' => 'newTitle',
            'body' => 'newBody',
            'begin_date' => '1975-06-25',
            'end_date' => '1975-10-10',
        ]);
    }

    /** @test */
    public function an_athlete_cannot_update_an_announcement()
    {
        $this->signInAthlete();

        $announcement = factory(Announcement::class)->create([
            'title' => 'Old Title',
            'body' => 'Old Body',
            'begin_date' => '2019-06-25',
            'end_date' => '2019-10-10',
        ]);

        $this->patch('api/announcements/'.$announcement->id, [
            'title' => 'newTitle',
            'body' => 'newBody',
            'begin_date' => '1975-06-25',
            'end_date' => '1975-10-10',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('announcements', [
            'title' => 'Old Title',
            'body' => 'Old Body',
            'begin_date' => '2019-06-25',
            'end_date' => '2019-10-10',
        ]);
    }

    /** @test */
    public function a_viewer_cannot_update_an_announcement()
    {
        $this->signInViewer();

        $announcement = factory(Announcement::class)->create([
            'title'      => 'Old Title',
            'body'       => 'Old Body',
            'begin_date' => '2019-06-25',
            'end_date'   => '2019-10-10',
        ]);

        $this->patch('api/announcements/'.$announcement->id, [
            'title'      => 'newTitle',
            'body'       => 'newBody',
            'begin_date' => '1975-06-25',
            'end_date'   => '1975-10-10',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('announcements', [
            'title'      => 'Old Title',
            'body'       => 'Old Body',
            'begin_date' => '2019-06-25',
            'end_date'   => '2019-10-10',
        ]);
    }

    /** @test */
    public function a_guest_cannot_update_an_announcement()
    {
        $announcement = factory(Announcement::class)->create([
            'title' => 'Old Title',
            'body' => 'Old Body',
            'begin_date' => '2019-06-25',
            'end_date' => '2019-10-10',
        ]);

        $this->patch('api/announcements/'.$announcement->id, [
            'title' => 'newTitle',
            'body' => 'newBody',
            'begin_date' => '1975-06-25',
            'end_date' => '1975-10-10',
        ])
            ->assertRedirect('/');

        $this->assertDatabaseHas('announcements', [
            'title' => 'Old Title',
            'body' => 'Old Body',
            'begin_date' => '2019-06-25',
            'end_date' => '2019-10-10',
        ]);
    }
}
