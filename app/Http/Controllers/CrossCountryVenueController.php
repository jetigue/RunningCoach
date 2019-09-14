<?php

namespace App\Http\Controllers;

use App\Models\Properties\General\Season;
use App\Models\Properties\Meets\Venue;
use App\Models\Results\CrossCountry\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrossCountryVenueController extends Controller
{
    /**
     * List all of the cross country venues
     *
     * @return void
     */
    public function index()
    {
        $season = Season::where('slug', 'cross-country')->firstOrFail();

        $venues = Venue::where('season_id', $season->id)->orderBy('name', 'asc')->get();

        return view('venues.crossCountry.index', compact('venues'));
    }

    /**
     * Show the Boys Records for this Venue
     *
     * @param Venue $venue
     * @return void
     */
    public function showBoysRecords(Venue $venue)
    {

        $fastestBoys = Result::orderBy('total_seconds', 'asc')->orderBy('milliseconds', 'asc')
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_team_results.id', '=', 'cross_country_results.cross_country_team_result_id')
            ->join('cross_country_meets', 'cross_country_meets.id', '=', 'cross_country_team_results.cross_country_meet_id')
            ->join('venues', 'venues.id', '=', 'cross_country_meets.venue_id')
            ->join('events', 'events.id', '=', 'cross_country_team_results.event_id')
            ->join('meet_names', 'meet_names.id', '=', 'cross_country_meets.meet_name_id')
            ->where('venues.id', $venue->id)
            ->where('events.meters', 5000)
            ->where('athletes.sex', 'm')
            ->select(
                'cross_country_results.total_seconds',
                'cross_country_results.milliseconds',
                'cross_country_results.place',
                'athletes.first_name as firstName',
                'athletes.last_name as lastName',
                'athletes.grad_year',
                'athletes.id as athlete_id',
                'cross_country_meets.id as meet_id',
                'cross_country_meets.meet_date as date',
                'meet_names.name as meet'
            )
            ->limit(50)
            ->get();

        return view ('records.crossCountry.venues.boys.show', compact('venue', 'fastestBoys'));
    }

    public function showGirlsRecords(Venue $venue)
    {
        $fastestGirls = Result::orderBy('total_seconds', 'asc')->orderBy('milliseconds', 'asc')
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_team_results.id', '=', 'cross_country_results.cross_country_team_result_id')
            ->join('cross_country_meets', 'cross_country_meets.id', '=', 'cross_country_team_results.cross_country_meet_id')
            ->join('venues', 'venues.id', '=', 'cross_country_meets.venue_id')
            ->join('events', 'events.id', '=', 'cross_country_team_results.event_id')
            ->join('meet_names', 'meet_names.id', '=', 'cross_country_meets.meet_name_id')
            ->where('venues.id', $venue->id)
            ->where('events.meters', 5000)
            ->where('athletes.sex', 'f')
            ->select(
                'cross_country_results.total_seconds',
                'cross_country_results.milliseconds',
                'cross_country_results.place',
                'athletes.first_name as firstName',
                'athletes.last_name as lastName',
                'athletes.grad_year',
                'athletes.id as athlete_id',
                'cross_country_meets.id as meet_id',
                'cross_country_meets.meet_date as date',
                'meet_names.name as meet'
            )
            ->limit(50)
            ->get();

        return view('records.crossCountry.venues.girls.show', compact('venue','fastestGirls'));
    }
}
