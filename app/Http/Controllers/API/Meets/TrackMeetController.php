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
     * @param Request $request
     * @return TrackMeetController|TrackMeet
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        return $this->storeMeet($request);
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
     * Update the Track Meet in the Database
     *
     * @param Request $request
     * @param TrackMeet $trackMeet
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, TrackMeet $trackMeet)
    {
        return $this->updateMeet($request, $trackMeet);
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


    /**
     * Store a Track Meet in the Database
     * @return mixed
     */
    protected function storeMeet()
    {
        $trackMeet = request()->validate([
            'meet_name_id'     => 'required|integer',
            'meet_date'        => 'required|date',
            'season_id'        => 'required|integer',
            'host_id'          => 'required|integer',
            'venue_id'         => 'required|integer',
            'timing_method_id' => 'required|integer',
        ]);

        $trackMeet = TrackMeet::create($trackMeet);

        return $trackMeet->load('name', 'timing', 'venue', 'host', 'season');
    }

    /**
     * @param Request $request
     * @param TrackMeet $trackMeet
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function updateMeet(Request $request, TrackMeet $trackMeet): \Illuminate\Http\JsonResponse
    {
        $this->validate($request, [
            'meet_name_id'     => 'required|integer',
            'meet_date'        => 'required|date',
            'season_id'        => 'required|integer',
            'host_id'          => 'required|integer',
            'venue_id'         => 'required|integer',
            'timing_method_id' => 'required|integer',
        ]);

        $trackMeet->update(request([
            'meet_name_id',
            'meet_date',
            'season_id',
            'host_id',
            'venue_id',
            'timing_method_id'
        ]));

        return response()->json($trackMeet, 200);
    }
}
