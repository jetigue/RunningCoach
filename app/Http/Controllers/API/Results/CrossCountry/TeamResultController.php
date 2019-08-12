<?php

namespace App\Http\Controllers\API\Results\CrossCountry;

use App\Models\Meets\CrossCountryMeet;
use App\Models\Results\CrossCountry\TeamResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class TeamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $teamResults = TeamResult::with('division', 'crossCountryMeet')->get();

        return $teamResults;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param CrossCountryMeet $crossCountryMeet
     * @return Model
     */
    public function store(CrossCountryMeet $crossCountryMeet, TeamResult $teamResult)
    {
        request()->validate([
            'division_id'   => 'required|integer',
            'event_id'      => 'required|integer',
            'place'         => 'required|integer|lte:number_teams',
            'number_teams'  => 'required|integer|gte:place',
            'points'        => 'nullable|integer',
        ]);

        $teamResult = $crossCountryMeet->addTeamResult(request([
            'division_id',
            'event_id',
            'place',
            'number_teams',
            'points'
        ]));

        return $teamResult->load('division', 'event');
    }

    /**
     * Display the specified resource.
     *
     * @param CrossCountryMeet $crossCountryMeet
     * @param TeamResult $teamResult
     * @return Response
     */
    public function show(CrossCountryMeet $crossCountryMeet, TeamResult $teamResult)
    {

        return view('results.crossCountry.teamResults.show', compact('teamResult'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param TeamResult $teamResult
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, CrossCountryMeet $crossCountryMeet, TeamResult $teamResult)
    {
        $this->validate($request, [
            'division_id' => 'required|integer',
            'event_id' => 'required|integer',
            'place' => 'required|integer',
            'number_teams' => 'required|integer',
            'points' => 'nullable|integer',
        ]);

        $teamResult->update(request([
            'division_id',
            'event_id',
            'place',
            'number_teams',
            'points'
        ]));

        return response()->json($teamResult, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TeamResult $teamResult
     * @return Response
     * @throws \Exception
     */
    public function destroy(CrossCountryMeet $crossCountryMeet, TeamResult $teamResult)
    {
        $teamResult->delete();

        return response()->json(null, 204);
    }
}
