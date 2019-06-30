<?php

namespace App\Http\Controllers;

use App\Models\Team\Announcement;
use App\Models\Team\TeamEvent;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        $announcements = Announcement::all();

        $teamEvents = TeamEvent::orderBy('event_date', 'desc')->get();

        return view('welcome', compact('announcements', 'teamEvents'));

    }
}
