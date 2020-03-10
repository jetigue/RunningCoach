<?php

namespace App\Repositories;

use App\Models\Athlete;
use App\Models\Properties\Races\Track\Event;
use App\Models\Results\Track\Result;
use Illuminate\Support\Facades\DB;

class TrackSeasonBests
{
    public function trackResults()
    {
        return Result::join('athletes', 'track_results.athlete_id', '=', 'athletes.id')
            ->join('track_team_results', 'track_results.track_team_result_id', '=', 'track_team_results.id')
            ->join('track_meets', 'track_team_results.track_meet_id', '=', 'track_meets.id')
            ->join('meet_names', 'track_meets.meet_name_id', '=', 'meet_names.id')
            ->join('track_events', 'track_results.track_event_id', '=', 'track_events.id')
            ->select(
                'athletes.id as athleteID',
                'athletes.first_name as firstName',
                'athletes.last_name as lastName',
                'athletes.sex as sex',
                'athletes.grad_year as gradClass',
                'track_results.total_seconds as total_seconds',
                'track_results.milliseconds as milliseconds',
                'track_events.name as event',
                'track_events.meters as meters',
                'meet_names.name as meetName',
                'track_meets.meet_date as meetDate'
            )
            ->orderBy('track_results.total_seconds')
            ->orderBy('track_results.milliseconds');
    }


    public function trackResults2020()
    {
        return clone $this->trackResults()
            ->whereYear('track_meets.meet_date', '2020')
            ->get();
    }

    public function fastestMale800m2020()
    {
        return $this->trackResults()
            ->whereYear('track_meets.meet_date', '2020')
            ->where('athletes.sex', 'm')
            ->where('track_events.meters', 800)
            ->first();
    }

    public function fastestFemale800m2020()
    {
        return $this->trackResults()
            ->whereYear('track_meets.meet_date', '2020')
            ->where('athletes.sex', 'f')
            ->where('track_events.meters', 800)
            ->first();
    }

    public function fastestMale1200m2020()
    {
        return $this->trackResults()
            ->whereYear('track_meets.meet_date', '2020')
            ->where('athletes.sex', 'm')
            ->where('track_events.meters', 1200)
            ->first();
    }

    public function fastestFemale1200m2020()
    {
        return $this->trackResults()
            ->whereYear('track_meets.meet_date', '2020')
            ->where('athletes.sex', 'f')
            ->where('track_events.meters', 1200)
            ->first();
    }

    public function fastestMale1500m2020()
    {
        return $this->trackResults()
            ->whereYear('track_meets.meet_date', '2020')
            ->where('athletes.sex', 'm')
            ->where('track_events.meters', 1500)
            ->first();
    }

    public function fastestFemale1500m2020()
    {
        return $this->trackResults()
            ->whereYear('track_meets.meet_date', '2020')
            ->where('athletes.sex', 'f')
            ->where('track_events.meters', 1500)
            ->first();
    }

    public function fastestMale1600m2020()
    {
        return $this->trackResults()
            ->whereYear('track_meets.meet_date', '2020')
            ->where('athletes.sex', 'm')
            ->where('track_events.meters', 1600)
            ->first();
    }

    public function fastestFemale1600m2020()
    {
        return $this->trackResults()
            ->whereYear('track_meets.meet_date', '2020')
            ->where('athletes.sex', 'f')
            ->where('track_events.meters', 1600)
            ->first();
    }

    public function fastestMale3200m2020()
    {
        return $this->trackResults()
            ->whereYear('track_meets.meet_date', '2020')
            ->where('athletes.sex', 'm')
            ->where('track_events.meters', 3200)
            ->first();
    }

    public function fastestFemale3200m2020()
    {
        return $this->trackResults()
            ->whereYear('track_meets.meet_date', '2020')
            ->where('athletes.sex', 'f')
            ->where('track_events.meters', 3200)
            ->first();
    }

    public function maleAthletesBest1600m2020()
    {
        $event = Event::where('meters', 1600)->first();

        return Result::select(DB::raw('min(total_seconds), athlete_id, track_event_id'))
            ->groupBy('athlete_id', 'track_event_id')
            ->join('track_team_results', 'track_results.track_team_result_id', '=', 'track_team_results.id')
            ->join('track_meets', 'track_team_results.track_meet_id', '=', 'track_meets.id')
            ->join('meet_names', 'track_meets.meet_name_id', '=', 'meet_names.id')
            ->orderBy('total_seconds')
            ->with('athlete', 'event', 'teamResult')
            ->having('track_event_id', $event->id)
        ->get();

    }
}
