<?php

namespace App\Http\Controllers\API\Results\CrossCountry;

use App\Models\Meets\CrossCountryMeet;
use App\Models\Results\CrossCountry\TeamResult;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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
     * @return TeamResult[]|Builder[]|Collection
     */
    public function index()
    {
        $teamResults = TeamResult::with('division', 'crossCountryMeet', 'title')->get();

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
            'division_id'       => 'required|integer',
            'race_title_id'     => 'integer|nullable',
            'event_id'          => 'required|integer',
            'place'             => 'nullable|integer',
            'number_teams'      => 'required|integer',
            'number_runners'    => 'required|integer',
            'points'            => 'nullable|integer',
        ]);

        $teamResult = $crossCountryMeet->addTeamResult(request([
            'division_id',
            'race_title_id',
            'event_id',
            'place',
            'number_teams',
            'number_runners',
            'points'
        ]));

        return $teamResult->load('division', 'event', 'title');
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
            'division_id'       => 'required|integer',
            'race_title_id'     => 'integer|nullable',
            'event_id'          => 'required|integer',
            'place'             => 'integer|nullable',
            'number_teams'      => 'required|integer',
            'number_runners'    => 'required|integer',
            'points'            => 'integer|nullable',
        ]);

        $teamResult->update(request([
            'division_id',
            'race_title_id',
            'event_id',
            'place',
            'number_teams',
            'number_runners',
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
