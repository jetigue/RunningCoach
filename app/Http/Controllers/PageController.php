<?php

namespace App\Http\Controllers;

use App\Models\Team\Announcement;
use App\Models\Team\TeamEvent;
use Illuminate\Http\Request;
use App\Repositories\Athletes;

class PageController extends Controller
{
    public function welcome()
    {
        $announcements = Announcement::all();

        $teamEvents = TeamEvent::orderBy('event_date', 'desc')->get();

        return view('welcome', compact('announcements', 'teamEvents'));
    }

    public function boosterClub()
    {
        return view('main.boosterClub');
    }

    public function boysRoster(Athletes $athletes)
    {
        $seniors = $athletes->activeSeniorBoys()->sortBy('last_name');
        $juniors = $athletes->activeJuniorBoys()->sortBy('last_name');
        $sophomores = $athletes->activeSophomoreBoys()->sortBy('last_name');
        $freshmen = $athletes->activeFreshmenBoys()->sortBy('last_name');

        return view('main.boysRoster', compact(
            'seniors',
            'juniors',
            'sophomores',
            'freshmen'
        ));
    }

    public function coaches()
    {
        return view('main.coaches');
    }

    public function girlsRoster(Athletes $athletes)
    {
        $seniors = $athletes->activeSeniorGirls()->sortBy('last_name');
        $juniors = $athletes->activeJuniorGirls()->sortBy('last_name');
        $sophomores = $athletes->activeSophomoreGirls()->sortBy('last_name');
        $freshmen = $athletes->activeFreshmenGirls()->sortBy('last_name');

        return view('main.girlsRoster', compact(
            'seniors',
            'juniors',
            'sophomores',
            'freshmen'
        ));
    }

    public function sponsors()
    {
        return view('main.sponsors');
    }

    public function teamCamp()
    {
        return view('main.teamCamp');
    }
}
