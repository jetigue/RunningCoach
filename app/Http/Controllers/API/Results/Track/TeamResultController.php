<?php

namespace App\Http\Controllers\API\Results\Track;

use App\Models\Results\Track\TeamResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Meets\TrackMeet;

class TeamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filters)
    {
        $teamResults = TeamResult::filter($filters)
            ->with('gender', 'division', 'trackMeet')
            ->get();

        return $teamResults;
    }


    public function store(TrackMeet $trackMeet)
    {
        request()->validate([
            'gender_id'     => 'required|integer',
            'division_id'   => 'required|integer',
            'place'         => 'required|integer|lte:number_teams',
            'number_teams'  => 'required|integer|gte:place',
            'points'        => 'nullable|integer',
        ]);


        $teamResult = $trackMeet->addTeamResult(request([
            'gender_id',
            'division_id',
            'place',
            'number_teams',
            'points'
        ]));

        return $teamResult->load('gender', 'division');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Results\Track\TeamResult  $teamResult
     * @return \Illuminate\Http\Response
     */
    public function show(TrackMeet $trackMeet, TeamResult $teamResult)
    {
        return view('results.track.teamResults.show', compact('teamResult'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Results\Track\TeamResult  $teamResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrackMeet $trackMeet, TeamResult $teamResult)
    {
        $this->validate($request, [
            'gender_id' => 'required|integer',
            'division_id' => 'required|integer',
            'place' => 'required|integer',
            'number_teams' => 'required|integer',
            'points' => 'nullable|integer',
        ]);

        $teamResult->update(request([
            'gender_id',
            'division_id',
            'place',
            'number_teams',
            'points'
        ]));

        return response()->json($teamResult, 200);
    }


    /**
     * @param TeamResult $teamResult
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(TeamResult $teamResult)
    {
        $teamResult->delete();

        return response()->json(null, 204);
    }
}
