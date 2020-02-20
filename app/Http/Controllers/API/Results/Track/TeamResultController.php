<?php

namespace App\Http\Controllers\API\Results\Track;

use App\Models\Results\Track\TeamResult;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Meets\TrackMeet;
use Illuminate\Http\Response;

class TeamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($filters)
    {
        return TeamResult::filter($filters)
            ->with('division', 'trackMeet')
            ->get();
    }


    public function store(TrackMeet $trackMeet, TeamResult $teamResult)
    {
        request()->validate([
            'division_id'       => 'required|integer',
            'place'             => 'integer|lte:number_teams',
            'number_teams'      => 'required|integer|gte:place',
            'points'            => 'nullable|integer',
            'notes'             => 'nullable|string'
        ]);


        $teamResult = $trackMeet->addTeamResult(request([
            'division_id',
            'place',
            'number_teams',
            'points',
            'notes'
        ]));

        return $teamResult->load('division');

    }

    /**
     * Display the specified resource.
     *
     * @param TrackMeet $trackMeet
     * @param TeamResult $teamResult
     * @return Response
     */
    public function show(TrackMeet $trackMeet, TeamResult $teamResult)
    {

        return view('results.track.teamResults.show', compact('teamResult'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param TeamResult $teamResult
     * @return Response
     */
    public function update(Request $request, TrackMeet $trackMeet, TeamResult $teamResult)
    {
        $this->validate($request, [
            'division_id' => 'required|integer',
            'place' => 'required|integer',
            'number_teams' => 'required|integer',
            'points' => 'nullable|integer',
        ]);

        $teamResult->update(request([
            'division_id',
            'place',
            'number_teams',
            'points'
        ]));

        return response()->json($teamResult, 200);
    }


    /**
     * @param TrackMeet $trackMeet
     * @param TeamResult $teamResult
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(TrackMeet $trackMeet, TeamResult $teamResult)
    {
        $teamResult->delete();

        return response()->json(null, 204);
    }
}
