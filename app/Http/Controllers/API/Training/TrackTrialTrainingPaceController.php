<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Models\TimeTrials\Track\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrackTrialTrainingPaceController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Athlete $athlete
     * @param Request $request
     * @return void
     */
    public function show(Athlete $athlete, Request $request)
    {

        $season = Carbon::now()->year;


        $results = Result::where('athlete_id', $athlete->id)
            ->join('track_time_trial_races', 'track_time_trial_race_results.track_time_trial_race_id', '=', 'track_time_trial_races.id')
            ->join('track_events', 'track_time_trial_races.track_event_id', '=', 'track_events.id')
            ->join('track_time_trials', 'track_time_trial_races.track_time_trial_id', '=', 'track_time_trials.id')
            ->whereYear('track_time_trials.trial_date', $season)
            ->where('track_events.name', $request->event)
            ->select(
                'track_time_trials.trial_date as meet_date',
                'track_time_trial_race_results.total_seconds as seconds',
                'track_events.meters as meters',
                'track_events.name as event',
                'track_time_trials.name as meet_name');

        if ($request->result === 'best' ) {
            return $results->orderBy('seconds')->first();
        } else if ($request->result === 'latest') {
            return $results->orderBy('meet_date', 'desc')->first();
        } else {
            return $results->get();
        }
    }

}
