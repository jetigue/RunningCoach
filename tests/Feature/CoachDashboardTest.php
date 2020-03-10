<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CoachDashboardTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_coach_can_access_the_coach_dashboard()
    {
        $this->signInCoach();

        $this->get('/dashboard')->assertSeeText('Coach\'s Dashboard');
    }

    /** @test */
    public function an_admin_cannot_access_the_coach_dashboard()
    {
        $this->signInAdmin();

        $this->get('/dashboard')->assertDontSeeText('Coach\'s Dashboard');
    }

    /** @test */
    public function an_athlete_cannot_access_the_coach_dashboard()
    {
        $this->signInAthlete();

        $this->get('/dashboard')->assertDontSeeText('Coach\'s Dashboard');
    }

    /** @test */
    public function a_viewer_cannot_access_the_coach_dashboard()
    {
        $this->signInViewer();

        $this->get('/dashboard')->assertDontSeeText('Coach\'s Dashboard');
    }

    /** @test */
    public function a_guest_cannot_access_the_coach_dashboard()
    {
        $this->get('/dashboard')->assertRedirect('login');
    }
}
