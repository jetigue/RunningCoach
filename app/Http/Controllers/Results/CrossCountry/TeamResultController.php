<?php

namespace App\Http\Controllers\Results\CrossCountry;

use App\Http\Controllers\Controller;
use App\Models\Meets\CrossCountryMeet;
use App\Models\Results\CrossCountry\Result;
use App\Models\Results\CrossCountry\TeamResult;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TeamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $teamResults = TeamResult::with('division', 'event', 'raceTitle')
            ->orderBy('meet_date', 'desc')
            ->get();

        if (request()->expectsJson()) {
            return $teamResults;
        }

        return view('results.crossCountry.teamResults.index', compact('teamResults'));
    }

    /**
     * Display the specified resource.
     *
     * @param CrossCountryMeet $crossCountryMeet
     * @param TeamResult $teamResult
     * @param Result $results
     * @return Factory|View
     */
    public function show(CrossCountryMeet $crossCountryMeet, TeamResult $teamResult, Result $results)
    {
        $results = Result::where('cross_country_team_result_id', $teamResult->id)->orderBy('place')
            ->with('teamResult', 'athlete')->get();

        return view('results.crossCountry.teamResults.show', compact('teamResult', 'results'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TeamResult $teamResult
     * @return Response
     */
    public function edit(TeamResult $teamResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param TeamResult $teamResult
     * @return Response
     */
    public function update(Request $request, TeamResult $teamResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TeamResult $teamResult
     * @return Response
     */
    public function destroy(TeamResult $teamResult)
    {
        //
    }
}
