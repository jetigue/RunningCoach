<?php

namespace App\Http\Controllers\API\Results\Track;

use App\Models\Meets\TrackMeet;
use App\Models\Results\Track\Result;
use App\Models\Results\Track\TeamResult;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
     * @param TrackMeet $trackMeet
     * @param TeamResult $teamResult
     * @return mixed
     */
    public function store(TrackMeet $trackMeet, TeamResult $teamResult)
    {

        request()->validate([
            'athlete_id'    => 'required|integer',
            'event_id'      => 'required|integer',
            'place'         => 'required|integer',
            'minutes'       => 'required|integer',
            'seconds'       => 'required|integer',
            'milliseconds'  => 'integer',
            'points'        => 'nullable|integer',
        ]);

        $result = $teamResult->addResults(request([
            'athlete_id',
            'event_id',
            'place',
            'minutes',
            'seconds',
            'milliseconds',
            'points'
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
            'event_id' => 'required|integer',
            'minutes'   => 'required|integer',
            'seconds' => 'required|integer',
            'milliseconds' => 'integer',
            'place' => 'required|integer',
            'points' => 'nullable|integer',
        ]);

        $result->update(request([
            'athlete_id',
            'event_id',
            'minutes',
            'seconds',
            'milliseconds',
            'place',
            'points'
        ]));

        return response()->json($result, 200);
    }


    /**
     * @param TrackMeet $trackMeet
     * @param TeamResult $teamResult
     * @param Result $result
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(TrackMeet $trackMeet, TeamResult $teamResult, Result $result)
    {
        $result->delete();

        return response()->json(null, 204);
    }
}
