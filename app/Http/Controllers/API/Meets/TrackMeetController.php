<?php

namespace App\Http\Controllers\API\Meets;

use App\Filters\TrackMeetFilter;
use App\Models\Meets\TrackMeet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrackMeetController extends Controller
{

    /**
     * @param TrackMeetFilter $filters
     * @return mixed
     */
    public function index(TrackMeetFilter $filters)
    {
        $trackMeets = TrackMeet::filter($filters)
            ->with('season', 'host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->get();

        return $trackMeets;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trackMeet = request()->validate([
            'meet_name_id'      => 'required|integer',
            'meet_date'         => 'required|date',
            'season_id'         => 'required|integer',
            'host_id'           => 'required|integer',
            'venue_id'          => 'required|integer',
            'timing_method_id'  => 'required|integer',
        ]);

        $trackMeet = TrackMeet::create($trackMeet);

        return $trackMeet->load('name', 'timing', 'venue', 'host', 'season');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meets\TrackMeet  $trackMeet
     * @return \Illuminate\Http\Response
     */
    public function show(TrackMeet $trackMeet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meets\TrackMeet  $trackMeet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrackMeet $trackMeet)
    {
        request()->validate([
            'meet_name_id'      => 'required|integer',
            'meet_date'         => 'required|date',
            'season_id'         => 'required|integer',
            'host_id'           => 'required|integer',
            'venue_id'          => 'required|integer',
            'timing_method_id'  => 'required|integer',
        ]);

        $trackMeet->update(request([
            'meet_name_id',
            'meet_date',
            'host_id',
            'timing_method_id',
            'venue_id',
            'season_id'
        ]));

        return response()->json($trackMeet, 200);
    }


    /**
     * @param TrackMeet $trackMeet
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(TrackMeet $trackMeet)
    {
        $trackMeet->delete();

        return response()->json(null, 204);
    }
}
