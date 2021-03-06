<?php

namespace App\Http\Controllers;

use App\Models\Team\Announcement;
use App\Models\Team\TeamEvent;
use App\Repositories\Athletes;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display the Welcome page.
     *
     * @return Application|Factory|View
     */
    public function welcome()
    {
        $announcements = Announcement::whereDate('end_date', '>=', Carbon::today())->orderBy('updated_at', 'desc')->get();

        $teamEvents = TeamEvent::whereDate('event_date', '>=', Carbon::today())->orderBy('event_date', 'asc')->get();

        return view('welcome', compact('announcements', 'teamEvents'));
    }

    /**
     * Display the Booster Club page.
     *
     * @return void
     */
    public function boosterClub()
    {
        return view('main.boosterClub');
    }

    /**
     * Display the Boys' Roster Page.
     *
     * @param Athletes $athletes
     * @return Application|Factory|View
     */
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

    /**
     * Display the Coaches page.
     *
     * @return void
     */
    public function coaches()
    {
        return view('main.coaches');
    }

    /**
     * Display the Girls' Roster Page.
     *
     * @param Athletes $athletes
     * @return void
     */
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

    /**
     * Display the Longhorn 5k page.
     *
     * @return void
     */
    public function longhorn5k()
    {
        return view('main.longhorn5k');
    }

    /**
     * Display the Lambert river Run page.
     *
     * @return void
     */
    public function riverRun()
    {
        return view('main.riverRun');
    }

    /**
     * Display the team sponsors page.
     *
     * @return void
     */
    public function sponsors()
    {
        return view('main.sponsors');
    }

    /**
     * Display the Team Camp page.
     *
     * @return void
     */
    public function teamCamp()
    {
        return view('main.teamCamp');
    }
}
