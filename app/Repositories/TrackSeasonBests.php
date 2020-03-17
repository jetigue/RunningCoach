<?php

namespace App\Repositories;

use App\Models\Athlete;
use App\Models\Meets\TrackMeet;
use App\Models\Properties\Races\Track\Event;
use App\Models\Results\Track\Result;
use App\Models\Results\Track\TeamResult;
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

    public function athletesBest2020()
    {
        return Result::select(DB::raw('
                min(total_seconds) as total_seconds,
                track_results.milliseconds as milliseconds,
                athlete_id,
                athletes.first_name as firstName,
                athletes.last_name as lastName,
                athletes.sex as sex,
                athletes.grad_year as gradClass,
                track_event_id,
                track_events.name as event,
                meet_names.name as meetName,
                track_meets.id as meet,
                track_meets.slug as meetSlug,
                track_meets.meet_date as meetDate,
                seasons.name as season
            '))
            ->join('athletes', 'track_results.athlete_id', '=', 'athletes.id')
            ->join('track_events', 'track_results.track_event_id', '=', 'track_events.id')
            ->join('track_team_results', 'track_results.track_team_result_id', '=', 'track_team_results.id')
            ->join('track_meets', 'track_team_results.track_meet_id', '=', 'track_meets.id')
            ->join('meet_names', 'track_meets.meet_name_id', '=', 'meet_names.id')
            ->join('seasons', 'track_meets.season_id', '=', 'seasons.id')
            ->groupBy('athlete_id', 'track_event_id')
            ->orderBy('total_seconds')
            ->orderBy('milliseconds')
            ->whereYear('track_meets.meet_date', '2020');
    }

    public function femaleAthletesBest800m2020()
    {
        return $this->athletesBest2020()
            ->where('sex', 'f')
            ->where('track_events.meters', 800)
            ->get();
    }

    public function maleAthletesBest800m2020()
    {
        return $this->athletesBest2020()
            ->where('sex', 'm')
            ->where('track_events.meters', 800)
            ->get();
    }

    public function femaleAthletesBest1200m2020()
    {
        return $this->athletesBest2020()
            ->where('sex', 'f')
            ->where('track_events.meters', 1200)
            ->get();
    }

    public function maleAthletesBest1200m2020()
    {
        return $this->athletesBest2020()
            ->where('sex', 'm')
            ->where('track_events.meters', 1200)
            ->get();
    }

    public function femaleAthletesBest1500m2020()
    {
        return $this->athletesBest2020()
            ->where('sex', 'f')
            ->where('track_events.meters', 1500)
            ->get();
    }

    public function maleAthletesBest1500m2020()
    {
        return $this->athletesBest2020()
            ->where('sex', 'm')
            ->where('track_events.meters', 1500)
            ->get();
    }

    public function femaleAthletesBest1600m2020()
    {
        return $this->athletesBest2020()
            ->where('sex', 'f')
            ->where('track_events.meters', 1600)
            ->get();
    }

    public function maleAthletesBest1600m2020()
    {
        return $this->athletesBest2020()
            ->where('sex', 'm')
            ->where('track_events.meters', 1600)
            ->get();
    }

    public function femaleAthletesBest3200m2020()
    {
        return $this->athletesBest2020()
            ->where('sex', 'f')
            ->where('track_events.meters', 3200)
            ->get();
    }

    public function maleAthletesBest3200m2020()
    {
        return $this->athletesBest2020()
            ->where('sex', 'm')
            ->where('track_events.meters', 3200)
            ->get();
    }
}
