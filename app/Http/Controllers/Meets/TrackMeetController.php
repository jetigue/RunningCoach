<?php

namespace App\Http\Controllers\Meets;

use App\Filters\TrackMeetFilter;
use App\Models\Meets\TrackMeet;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TrackMeetController extends Controller
{

    /**
     * @param TrackMeetFilter $filters
     * @return Factory|View
     */
    public function index(TrackMeetFilter $filters)
    {
        $trackMeets = TrackMeet::filter($filters)
            ->with('season', 'host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->get();

        return view('meets.track.index', compact('trackMeets'));
    }


    /**
     * Display the specified resource.
     *
     * @param TrackMeet $trackMeet
     * @return Factory|View
     */
    public function show(TrackMeet $trackMeet)
    {
        return view('meets.track.show', compact('trackMeet'));
    }

}
