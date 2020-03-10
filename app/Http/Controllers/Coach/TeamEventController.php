<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Models\Team\TeamEvent;
use Illuminate\Http\Request;

class TeamEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamEvents = TeamEvent::orderBy('event_date', 'desc')->get();

        if (request()->expectsJson()) {
            return $teamEvents;
        }

        return view('team.teamEvents.index', compact('teamEvents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team\TeamEvent  $teamEvent
     * @return \Illuminate\Http\Response
     */
    public function show(TeamEvent $teamEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team\TeamEvent  $teamEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamEvent $teamEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team\TeamEvent  $teamEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamEvent $teamEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team\TeamEvent  $teamEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamEvent $teamEvent)
    {
        //
    }
}
