<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AthleteVDOTController extends Controller
{

    /**
     * @param Request $request
     * @return Collection
     */
    public function show(Request $request)
    {
        $athlete = Athlete::firstWhere('id', $request->athlete);

        $xc = DB::table('cross_country_results')
            ->where('athlete_id', $athlete->id)
            ->join(
                'athletes',
                'cross_country_results.athlete_id',
                '=',
                'athletes.id'
            )
            ->join(
                'cross_country_team_results',
                'cross_country_results.cross_country_team_result_id',
                '=',
                'cross_country_team_results.id'
            )
            ->join(
                'cross_country_meets',
                'cross_country_team_results.cross_country_meet_id',
                '=',
                'cross_country_meets.id'
            )
            ->orderBy('cross_country_meets.meet_date', 'desc')
            ->take(1)
            ->select('vdot', 'cross_country_meets.meet_date as date')
            ->get();


        $xcTT =  DB::table('xc_time_trial_results')
            ->where('athlete_id', $athlete->id)
            ->join(
                'athletes',
                'xc_time_trial_results.athlete_id',
                '=',
                'athletes.id'
            )
            ->join(
                'xc_time_trial_races',
                'xc_time_trial_results.xc_time_trial_race_id',
                '=',
                'xc_time_trial_races.id'
            )
            ->join('xc_time_trials',
                'xc_time_trial_races.xc_time_trial_id',
                '=',
                'xc_time_trials.id'
            )
            ->orderBy('xc_time_trials.trial_date', 'desc')
            ->take(1)
            ->select( 'vdot', 'xc_time_trials.trial_date as date')
            ->get();

        $track = DB::table('track_results')
            ->where('athlete_id', $athlete->id)
            ->join(
                'track_events',
                'track_results.track_event_id',
                '=',
                'track_events.id'
            )
            ->join(
                'athletes',
                'track_results.athlete_id',
                '=',
                'athletes.id'
            )
            ->join(
                'track_team_results',
                'track_results.track_team_result_id',
                '=',
                'track_team_results.id'
            )
            ->join(
                'track_meets',
                'track_team_results.track_meet_id',
                '=',
                'track_meets.id'
            )
            ->where('track_events.meters', '>=', 1600)
            ->orderBy('track_meets.meet_date', 'desc')
            ->take(1)
            ->select('vdot', 'track_meets.meet_date as date')
            ->get();


        $trackTT =  DB::table('track_time_trial_race_results')
            ->where('athlete_id', $athlete->id)
            ->join(
                'athletes',
                'track_time_trial_race_results.athlete_id',
                '=',
                'athletes.id'
            )
            ->join(
                'track_time_trial_races',
                'track_time_trial_race_results.track_time_trial_race_id',
                '=',
                'track_time_trial_races.id'
            )
            ->join(
                'track_events',
                'track_time_trial_races.track_event_id',
                '=',
                'track_events.id'
            )
            ->join(
                'track_time_trials',
                'track_time_trial_races.track_time_trial_id',
                '=',
                'track_time_trials.id'
            )
            ->where('track_events.meters', '>=', 1600)
            ->orderBy('track_time_trials.trial_date', 'desc')
            ->take(1)
            ->select('vdot', 'track_time_trials.trial_date as date')
            ->get();

            return $xc->merge($xcTT)->merge($track)->merge($trackTT);

    }
}
