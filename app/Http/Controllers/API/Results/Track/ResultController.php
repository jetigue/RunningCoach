<?php

namespace App\Http\Controllers\API\Results\Track;

use App\Http\Controllers\Controller;
use App\Models\Meets\TrackMeet;
use App\Models\Results\Track\Result;
use App\Models\Results\Track\TeamResult;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TrackMeet $trackMeet
     * @param TeamResult $teamResult
     * @return Model
     */
    public function store(TrackMeet $trackMeet, TeamResult $teamResult)
    {
        request()->validate([
            'athlete_id'        => 'required|integer',
            'track_event_id'    => 'required|integer',
            'place'             => 'required|integer',
            'milliseconds'      => 'nullable|integer',
            'points'            => 'nullable|integer',
            'heat'              => 'required|integer',
            'minutes'           => 'required|integer',
            'seconds'           => 'required|integer',

        ]);

        $result = $teamResult->addResults(request([
            'athlete_id',
            'track_event_id',
            'place',
            'milliseconds',
            'points',
            'heat',
            'total_seconds' => request('minutes') * 60 + request('seconds'),
        ]));

        return $result->load('athlete', 'event');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Results\Track\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * @param Request $request
     * @param TrackMeet $trackMeet
     * @param TeamResult $teamResult
     * @param Result $result
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, TrackMeet $trackMeet, TeamResult $teamResult, Result $result)
    {
        $this->validate($request, [
            'athlete_id' => 'required|integer',
            'track_event_id' => 'required|integer',
            'minutes'   => 'required|integer',
            'seconds' => 'required|integer',
            'milliseconds' => 'nullable|integer',
            'place' => 'required|integer',
            'points' => 'nullable|integer',
            'heat' => 'required|integer',
        ]);

        $result->update(request([
            'athlete_id',
            'track_event_id',
            'milliseconds',
            'place',
            'points',
            'heat',
            ]) + ['total_seconds' => (request('minutes') * 60) + request('seconds')]);

        return response()->json($result, 200);
    }

    /**
     * @param TrackMeet $trackMeet
     * @param TeamResult $teamResult
     * @param Result $result
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(TrackMeet $trackMeet, TeamResult $teamResult, Result $result)
    {
        $result->delete();

        return response()->json(null, 204);
    }
}
