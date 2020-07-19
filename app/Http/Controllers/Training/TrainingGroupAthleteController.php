<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Models\Training\Group;
use App\Repositories\Athletes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingGroupAthleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach');
    }

    public function index()
    {
        $crimson = Group::firstWhere('name', 'Crimson');
        $black = Group::firstWhere('name', 'Black');
        $white= Group::firstWhere('name', 'White');
        $green = Group::firstWhere('name', 'Green');
        $none = Group::firstWhere('name', 'None');

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
                DB::raw('MAX(xc_time_trials.trial_date) as date',)
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
                DB::raw('MAX(track_time_trials.trial_date) as date',)
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
                DB::raw('MAX(track_meets.meet_date) as date',)
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
                DB::raw('MAX(cross_country_meets.meet_date) as date',)
            )
            ->groupBy('athlete_id');

        $athletesLatestXCTTResults = DB::table('athletes')
            ->leftJoinSub($latestXCTTResults, 'latest_xc_tt_results', function ($join) {
                $join->on('athletes.id', '=', 'latest_xc_tt_results.athlete_id');
        })
        ->where('status', 'a')
        ->orderBy('last_name')
        ->orderBy('first_name')
        ->select('id', 'first_name', 'last_name', 'sex', 'grad_year', 'vdot', 'date');

        $athletesLatestXCResults = DB::table('athletes')
            ->leftJoinSub($latestXCResults, 'latest_xc_results', function ($join) {
                $join->on('athletes.id', '=', 'latest_xc_results.athlete_id');
        })
        ->where('status', 'a')
        ->orderBy('last_name')
        ->orderBy('first_name')
        ->select('id', 'first_name', 'last_name', 'sex', 'grad_year', 'vdot', 'date');

        $athletesLatestTrackResults = DB::table('athletes')
            ->leftJoinSub($latestXCResults, 'latest_track_results', function ($join) {
                $join->on('athletes.id', '=', 'latest_track_results.athlete_id');
        })
        ->where('status', 'a')
        ->orderBy('last_name')
        ->orderBy('first_name')
        ->select('id', 'first_name', 'last_name', 'sex', 'grad_year', 'vdot', 'date');

        $athletesLatestTrackTTResults = DB::table('athletes')
            ->leftJoinSub($latestXCResults, 'latest_track_tt_results', function ($join) {
                $join->on('athletes.id', '=', 'latest_track_tt_results.athlete_id');
        })
        ->where('status', 'a')
        ->orderBy('last_name')
        ->orderBy('first_name')
        ->select('id', 'first_name', 'last_name', 'sex', 'grad_year', 'vdot', 'date');


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
                $athletes = $athletesLatestXCTTResults;
                break;
            case ($currentDate >= $beginXC && $currentDate <= $endXC):
                $athletes = $athletesLatestXCResults;
                break;
            case ($currentDate >= $beginWinter && $currentDate <= $endWinter):
                $athletes = $athletesLatestTrackTTResults;
                break;
            case ($currentDate >= $beginTrack && $currentDate <= $endTrack):
                $athletes = $athletesLatestTrackResults;
        }

//        $athletes = DB::table('athletes')
//            ->where('status', 'a')
//            ->orderBy('last_name')
//            ->orderBy('first_name')
//            ->select('id', 'first_name', 'last_name', 'sex', 'training_group_id');

        $athletes2 = clone $athletes;
        $athletes3 = clone $athletes;
        $athletes4 = clone $athletes;
        $athletes5 = clone $athletes;
        $athletes6 = clone $athletes;
        $athletes7 = clone $athletes;
        $athletes8 = clone $athletes;
        $athletes9 = clone $athletes;
        $athletes10 = clone $athletes;

        $crimsonGroupMales = $athletes->where('training_group_id', $crimson->id)->where('sex', 'm')->get();
        $blackGroupMales = $athletes2->where('training_group_id', $black->id)->where('sex', 'm')->get();
        $whiteGroupMales = $athletes3->where('training_group_id', $white->id)->where('sex', 'm')->get();
        $greenGroupMales = $athletes4->where('training_group_id', $green->id)->where('sex', 'm')->get();
        $noneGroupMales = $athletes5->where('training_group_id', $none->id)->where('sex', 'm')->get();

        $crimsonGroupFemales = $athletes6->where('training_group_id', $crimson->id)->where('sex', 'f')->get();
        $blackGroupFemales = $athletes7->where('training_group_id', $black->id)->where('sex', 'f')->get();
        $whiteGroupFemales = $athletes8->where('training_group_id', $white->id)->where('sex', 'f')->get();
        $greenGroupFemales = $athletes9->where('training_group_id', $green->id)->where('sex', 'f')->get();
        $noneGroupFemales = $athletes10->where('training_group_id', $none->id)->where('sex', 'f')->get();

        return view('athletes.trainingGroups.index', compact(
            'crimson',
            'black',
            'white',
            'green',
            'none',
            'crimsonGroupMales',
            'blackGroupMales',
            'whiteGroupMales',
            'greenGroupMales',
            'noneGroupMales',
            'crimsonGroupFemales',
            'blackGroupFemales',
            'whiteGroupFemales',
            'greenGroupFemales',
            'noneGroupFemales',
        ));
    }
}
