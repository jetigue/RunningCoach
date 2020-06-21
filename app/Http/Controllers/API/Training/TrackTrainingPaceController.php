<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Models\Results\Track\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrackTrainingPaceController extends Controller
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

        $trackResults = Result::where('athlete_id', $athlete->id)
            ->join('track_team_results', 'track_results.track_team_result_id', '=', 'track_team_results.id')
            ->join('track_events', 'track_results.track_event_id', '=', 'track_events.id')
            ->join('track_meets', 'track_team_results.track_meet_id', '=', 'track_meets.id')
            ->join('track_meet_names', 'track_meets.track_meet_name_id', '=', 'track_meet_names.id')
            ->whereYear('track_meets.meet_date', $season)
            ->where('track_events.name', $request->event)
            ->select(
                'track_meets.meet_date as meet_date',
                'track_results.total_seconds as seconds',
                'track_events.meters as meters',
                'track_events.name as event',
                'track_meet_names.name as meet_name'
            );

        if ($request->result === 'best' ) {
            return $trackResults->orderBy('seconds')->first();
        } else if ($request->result === 'latest') {
            return $trackResults->orderBy('meet_date', 'desc')->first();
        } else {
            return $trackResults->get();
        }
    }
}
