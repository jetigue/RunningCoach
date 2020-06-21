<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Models\Results\CrossCountry\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class XCTrainingPaceController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Athlete $athlete
     * @param Request $request
     * @return Response
     */
    public function show(Athlete $athlete, Request $request)
    {
        if (Carbon::now()->month >= 8) {
            $season = Carbon::now()->year;
        } else {
            $season = Carbon::now()->year - 1;
        }

        $XCResults = Result::where('athlete_id', $athlete->id)
            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
            ->join('cross_country_events', 'cross_country_team_results.cross_country_event_id', '=', 'cross_country_events.id')
            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
            ->join('cross_country_meet_names', 'cross_country_meets.cross_country_meet_name_id', '=', 'cross_country_meet_names.id')
            ->whereYear('cross_country_meets.meet_date', $season)
            ->where('cross_country_events.name', $request->event)
            ->select(
                'cross_country_meets.meet_date as meet_date',
                'cross_country_results.total_seconds as seconds',
                'cross_country_events.meters as meters',
                'cross_country_events.name as event',
                'cross_country_meet_names.name as meet_name');

        if ($request->result === 'best' ) {
            return $XCResults->orderBy('seconds')->first();
        } else if ($request->result === 'latest') {
            return $XCResults->orderBy('meet_date', 'desc')->first();
        } else {
            return $XCResults->get();
        }
    }
}
