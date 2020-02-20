<?php

namespace App\Http\Controllers\API\Results\CrossCountry;

use App\Models\Meets\CrossCountryMeet;
use App\Models\Results\CrossCountry\TeamResult;
use App\Models\Results\CrossCountry\Result;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class TeamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TeamResult[]|Builder[]|Collection
     */
    public function index()
    {
        return TeamResult::with('division', 'crossCountryMeet', 'title')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CrossCountryMeet $crossCountryMeet
     * @param TeamResult $teamResult
     * @return Model
     */
    public function store(CrossCountryMeet $crossCountryMeet, TeamResult $teamResult)
    {
        request()->validate([
            'division_id'               => 'required|integer',
            'race_title_id'             => 'integer|nullable',
            'cross_country_event_id'    => 'required|integer',
            'place'                     => 'nullable|integer',
            'number_teams'              => 'required|integer',
            'number_runners'            => 'required|integer',
            'points'                    => 'nullable|integer',
            'notes'                     => 'nullable|string'
        ]);

        $teamResult = $crossCountryMeet->addTeamResult(request([
            'division_id',
            'race_title_id',
            'cross_country_event_id',
            'place',
            'number_teams',
            'number_runners',
            'points',
            'notes'
        ]));

        return $teamResult->load('division', 'event', 'title');
    }

    /**
     * Display the specified resource.
     *
     * @param CrossCountryMeet $crossCountryMeet
     * @param TeamResult $teamResult
     * @return Factory|View
     */
    public function show(CrossCountryMeet $crossCountryMeet, TeamResult $teamResult)
    {
        $results = Result::where('cross_country_team_result_id', $teamResult->id)->orderBy('place')
            ->with('teamResult', 'athlete')->get();

        return view('results.crossCountry.teamResults.show', compact('teamResult', 'results'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CrossCountryMeet $crossCountryMeet
     * @param TeamResult $teamResult
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, CrossCountryMeet $crossCountryMeet, TeamResult $teamResult)
    {
        $this->validate($request, [
            'division_id'               => 'required|integer',
            'race_title_id'             => 'integer|nullable',
            'cross_country_event_id'    => 'required|integer',
            'place'                     => 'integer|nullable',
            'number_teams'              => 'required|integer',
            'number_runners'            => 'required|integer',
            'points'                    => 'integer|nullable',
            'notes'                     => 'nullable|string'
        ]);

        $teamResult->update(request([
            'division_id',
            'race_title_id',
            'cross_country_event_id',
            'place',
            'number_teams',
            'number_runners',
            'points',
            'notes'
        ]));

        return response()->json($teamResult, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CrossCountryMeet $crossCountryMeet
     * @param TeamResult $teamResult
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(CrossCountryMeet $crossCountryMeet, TeamResult $teamResult)
    {
        $teamResult->delete();

        return response()->json(null, 204);
    }
}
