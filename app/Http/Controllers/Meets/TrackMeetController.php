<?php

namespace App\Http\Controllers\Meets;

use App\Filters\TrackMeetFilter;
use App\Models\Meets\TrackMeet;
use App\Http\Controllers\Controller;

class TrackMeetController extends Controller
{

    /**
     * @param TrackMeetFilter $filters
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @param  \App\Models\Meets\TrackMeet  $trackMeet
     * @return \Illuminate\Http\Response
     */
    public function show(TrackMeet $trackMeet)
    {
        return view('meets.track.show', compact('trackMeet'));
    }

}
