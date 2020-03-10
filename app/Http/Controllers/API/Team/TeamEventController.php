<?php

namespace App\Http\Controllers\API\Team;

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
        $teamEvents = TeamEvent::all()->sortBy('event_date');

        return $teamEvents;
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
        $teamEvent = request()->validate([
            'name'          => 'required|string|min:3',
            'event_date'    => 'required|date',
            'event_time'    => 'required|string',
            'location'      => 'required|string',
            'details'       => 'string|nullable',
            'link'          => 'active_url|nullable',
            'link_text'     => 'string|nullable',
        ]);

        $teamEvent = TeamEvent::create($teamEvent);

        return response()->json($teamEvent, 201);
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
        request()->validate([
            'name'          => 'required|string|min:3',
            'event_date'    => 'required|date',
            'event_time'    => 'required|string',
            'location'      => 'required|string',
            'details'       => 'string|nullable',
            'link'          => 'active_url|nullable',
            'link_text'     => 'string|nullable',
        ]);

        $teamEvent->update(request([
            'name',
            'event_date',
            'event_time',
            'location',
            'details',
            'link',
            'link_text',
        ]));

        return response()->json($teamEvent, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team\TeamEvent  $teamEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamEvent $teamEvent)
    {
        $teamEvent->delete();

        return response()->json(null, 204);
    }
}
