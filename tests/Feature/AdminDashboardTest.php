<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminDashboardTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_admin_dashboard()
    {
        $this->signInAdmin();

        $this->get('/dashboard')->assertSeeText('Admin\'s Dashboard');
    }

    /** @test */
    public function a_coach_cannot_access_the_admin_dashboard()
    {
        $this->signInCoach();

        $this->get('/dashboard')->assertDontSeeText('Admin\'s Dashboard');
    }

    /** @test */
    public function an_athlete_cannot_access_the_admin_dashboard()
    {
        $this->signInAthlete();

        $this->get('/dashboard')->assertDontSeeText('Admin\'s Dashboard');
    }

    /** @test */
    public function a_viewer_cannot_access_the_admin_dashboard()
    {
        $this->signInViewer();

        $this->get('/dashboard')->assertDontSeeText('Admin\'s Dashboard');
    }

    /** @test */
    public function a_guest_cannot_access_the_admin_dashboard()
    {
        $this->get('/dashboard')->assertRedirect('login');
    }
}
