<?php

namespace App\Http\Controllers\Results\CrossCountry;

use App\Models\Meets\CrossCountryMeet;
use App\Models\Results\CrossCountry\Result;
use App\Models\Results\CrossCountry\TeamResult;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TeamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TeamResult[]|Builder[]|Collection
     */
    public function index()
    {
        $teamResults = TeamResult::with('division', 'event', 'raceTitle')->orderBy('meet_date', 'desc')->get();

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
     * @return Response
     */
    public function show(CrossCountryMeet $crossCountryMeet, TeamResult $teamResult, Result $results)
    {

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
