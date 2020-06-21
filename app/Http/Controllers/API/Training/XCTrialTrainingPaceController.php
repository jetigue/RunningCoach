<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Models\TimeTrials\CrossCountry\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class XCTrialTrainingPaceController extends Controller
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
        if (Carbon::now()->month >= 6) {
            $season = Carbon::now()->year;
        } else {
            $season = Carbon::now()->year - 1;
        }

        $results = Result::where('athlete_id', $athlete->id)
            ->join('xc_time_trial_races', 'xc_time_trial_results.xc_time_trial_race_id', '=', 'xc_time_trial_races.id')
            ->join('cross_country_events', 'xc_time_trial_races.cross_country_event_id', '=', 'cross_country_events.id')
            ->join('xc_time_trials', 'xc_time_trial_races.xc_time_trial_id', '=', 'xc_time_trials.id')
            ->whereYear('xc_time_trials.trial_date', $season)
            ->where('cross_country_events.name', $request->event)
            ->select(
                'xc_time_trials.trial_date as meet_date',
                'xc_time_trial_results.total_seconds as seconds',
                'cross_country_events.meters as meters',
                'cross_country_events.name as event',
                'xc_time_trials.name as meet_name');

        if ($request->result === 'best' ) {
            return $results->orderBy('seconds')->first();
        } else if ($request->result === 'latest') {
            return $results->orderBy('meet_date', 'desc')->first();
        } else {
            return $results->get();
        }
    }
}
