<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Models\Training\Group;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingGroupVDOTController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return float
     */
    public function average(Request $request)
    {
        $group = Group::firstWhere('name', $request->group);

        $latestXCTTResults = DB::table('xc_time_trial_results')
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
            ->select(
                'athlete_id',
                'vdot',
                DB::raw('MAX(xc_time_trials.trial_date) as last_result',)
            )
            ->groupBy('athlete_id');

        $latestTrackTTResults = DB::table('track_time_trial_race_results')
            ->join(
                'track_time_trial_races',
                'track_time_trial_race_results.track_time_trial_race_id',
                '=',
                'track_time_trial_races.id'
            )
            ->join('track_time_trials',
                'track_time_trial_races.track_time_trial_id',
                '=',
                'track_time_trials.id'
            )
            ->join(
                'track_events',
                'track_time_trial_races.track_event_id',
                '=',
                'track_events.id'
            )
            ->select(
                'athlete_id',
                'vdot',
                DB::raw('MAX(track_time_trials.trial_date) as last_result',)
            )
            ->where('track_events.meters', '>=', 1600)
            ->groupBy('athlete_id');

        $latestTrackResults = DB::table('track_results')
            ->join(
                'track_team_results',
                'track_results.track_team_result_id',
                '=',
                'track_team_results.id'
            )
            ->join('track_meets',
                'track_team_results.track_meet_id',
                '=',
                'track_meets.id'
            )
            ->join(
                'track_events',
                'track_results.track_event_id',
                '=',
                'track_events.id'
            )
            ->select(
                'athlete_id',
                'vdot',
                DB::raw('MAX(track_meets.meet_date) as last_result',)
            )
            ->where('track_events.meters', '>=', 1600)
            ->groupBy('athlete_id');

        $latestXCResults = DB::table('cross_country_results')
            ->join(
                'cross_country_team_results',
                'cross_country_results.cross_country_team_result_id',
                '=',
                'cross_country_team_results.id'
            )
            ->join('cross_country_meets',
                'cross_country_team_results.cross_country_meet_id',
                '=',
                'cross_country_meets.id'
            )
            ->select(
                'athlete_id',
                'vdot',
                DB::raw('MAX(cross_country_meets.meet_date) as last_result',)
            )
            ->groupBy('athlete_id');

        $athletesLatestXCTTResults = DB::table('athletes')
            ->joinSub($latestXCTTResults, 'latest_xc_tt_results', function ($join) {
                $join->on('athletes.id', '=', 'latest_xc_tt_results.athlete_id');
        })
            ->where('training_group_id', $group->id)
            ->where('sex', $request->sex)
            ->get();

        $athletesLatestXCResults = DB::table('athletes')
            ->joinSub($latestXCResults, 'latest_xc_results', function ($join) {
                $join->on('athletes.id', '=', 'latest_xc_results.athlete_id');
        })
            ->where('training_group_id', $group->id)
            ->where('sex', $request->sex)
            ->get();

        $athletesLatestTrackResults = DB::table('athletes')
            ->joinSub($latestTrackResults, 'latest_track_results', function ($join) {
                $join->on('athletes.id', '=', 'latest_track_results.athlete_id');
        })
            ->where('training_group_id', $group->id)
            ->where('sex', $request->sex)
            ->get();

        $athletesLatestTrackTTResults = DB::table('athletes')
            ->joinSub($latestTrackTTResults, 'latest_track_tt_results', function ($join) {
                $join->on('athletes.id', '=', 'latest_track_tt_results.athlete_id');
        })
            ->where('training_group_id', $group->id)
            ->where('sex', $request->sex)
            ->get();

        $currentDate = Carbon::now();
        $beginTrack = Carbon::createFromFormat('m-d', '02-01');
        $endTrack = Carbon::createFromFormat('m-d', '05-31');
        $beginSummer = Carbon::createFromFormat('m-d', '06-01');
        $endSummer = Carbon::createFromFormat('m-d', '08-15');
        $beginXC = Carbon::createFromFormat('m-d', '08-16');
        $endXC = Carbon::createFromFormat('m-d', '11-30');
        $beginWinter = Carbon::createFromFormat('m-d', '12-01');
        $endWinter = Carbon::createFromFormat('m-d', '01-31');

        switch($currentDate) {
            case ($currentDate >= $beginSummer && $currentDate <= $endSummer):
                return round($athletesLatestXCTTResults->avg('vdot'),1);
            case ($currentDate >= $beginXC && $currentDate <= $endXC):
                return round($athletesLatestXCResults->avg('vdot'), 1);
            case ($currentDate >= $beginWinter && $currentDate <= $endWinter):
                return round($athletesLatestTrackTTResults->avg('vdot'), 1);
            case ($currentDate >= $beginTrack && $currentDate <= $endTrack):
                return round($athletesLatestTrackResults->avg('vdot'), 1);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
