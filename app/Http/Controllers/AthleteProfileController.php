<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Meets\CrossCountryMeet;
use App\Models\Results\CrossCountry\Result;
use App\Models\Results\CrossCountry\TeamResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AthleteProfileController extends Controller
{
    public function show(Athlete $athlete, TeamResult $teamResults,Result $results)
    {

        $crossMeets = CrossCountryMeet::whereHas('results', function ($query) use ($athlete) {
             $query->where('athlete_id', $athlete->id);
        })
            ->orderBy('meet_date', 'desc')
            ->with('name', 'teamResults.event', 'teamResults.division.level', 'results')
            ->get();

        $crossResults = Result::where('athlete_id', $athlete->id)
            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
            ->join('meet_names', 'cross_country_meets.meet_name_id', '=', 'meet_names.id')
            ->join('divisions', 'cross_country_team_results.division_id', '=', 'divisions.id')
            ->join('levels', 'divisions.level_id', '=', 'levels.id')
            ->join('events', 'cross_country_team_results.event_id', '=', 'events.id')
            ->select(
                'cross_country_results.*',
                'cross_country_meets.meet_date as date',
                'cross_country_meets.slug as slug',
                'cross_country_team_results.id as teamResultId',
                'meet_names.name',
                'levels.name as level',
                'events.name as event'
            )
            ->orderBy('date', 'desc')
            ->get();

        return view('profiles.athletes.show', compact('athlete', 'crossResults'));
    }
}
