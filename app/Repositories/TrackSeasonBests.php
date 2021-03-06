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
            ->join('track_meet_names', 'track_meets.track_meet_name_id', '=', 'track_meet_names.id')
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
                'track_meet_names.name as meetName',
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
        return Result::select('*', DB::raw('
                track_results.id,
                min(track_results.total_seconds),
                athletes.first_name as firstName,
                athletes.last_name as lastName,
                athletes.sex as sex,
                athletes.grad_year as gradClass,
                track_events.name as event,
                track_meet_names.name as meetName,
                seasons.name as season,
                track_meets.slug as meetSlug,
                track_meets.meet_date as meetDate
            '))
            ->join('athletes', 'track_results.athlete_id', '=', 'athletes.id')
            ->join('track_events', 'track_results.track_event_id', '=', 'track_events.id')
            ->join('track_team_results', 'track_results.track_team_result_id', '=', 'track_team_results.id')
            ->join('track_meets', 'track_team_results.track_meet_id', '=', 'track_meets.id')
            ->join('seasons', 'track_meets.season_id', '=', 'seasons.id')
            ->join('track_meet_names', 'track_meets.track_meet_name_id', '=', 'track_meet_names.id')
            ->groupBy('track_event_id', 'athlete_id')
            ->orderBy('total_seconds')
            ->orderBy('milliseconds')
            ->whereYear('track_meets.meet_date', '2020');

    }
    public function seasonsBest2020()
    {

        return Result::join('athletes', 'track_results.athlete_id', '=', 'athletes.id')
            ->join('track_team_results', 'track_results.track_team_result_id', '=', 'track_team_results.id')
            ->join('track_meets', 'track_team_results.track_meet_id', '=', 'track_meets.id')
            ->join('track_meet_names', 'track_meets.track_meet_name_id', '=', 'track_meet_names.id')
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
                'track_meet_names.name as meetName',
                'track_meets.id as meetID',
                'track_meets.meet_date as meetDate'
            )
            ->selectRaw('min(total_seconds) as bestTime')
            ->orderBy('track_results.total_seconds')
            ->orderBy('track_results.milliseconds')
            ->groupBy('athleteID', 'meetID');
    }


    public function femaleAthletesBest800m2020()
    {
        return $this->seasonsBest2020()
            ->where('sex', 'f')
            ->where('track_events.meters', 800)
            ->get();
    }

    public function maleAthletesBest800m2020()
    {
        return $this->seasonsBest2020()
            ->where('sex', 'm')
            ->where('track_events.meters', 800)
            ->get();
    }

    public function femaleAthletesBest1200m2020()
    {
        return $this->seasonsBest2020()
            ->where('sex', 'f')
            ->where('track_events.meters', 1200)
            ->get();
    }

    public function maleAthletesBest1200m2020()
    {
        return $this->seasonsBest2020()
            ->where('sex', 'm')
            ->where('track_events.meters', 1200)
            ->get();
    }

    public function femaleAthletesBest1500m2020()
    {
        return $this->seasonsBest2020()
            ->where('sex', 'f')
            ->where('track_events.meters', 1500)
            ->get();
    }

    public function maleAthletesBest1500m2020()
    {
        return $this->seasonsBest2020()
            ->where('sex', 'm')
            ->where('track_events.meters', 1500)
            ->get();
    }

    public function femaleAthletesBest1600m2020()
    {
        return $this->seasonsBest2020()
            ->where('sex', 'f')
            ->where('track_events.meters', 1600)
            ->get();
    }

    public function maleAthletesBest1600m2020()
    {
        return $this->seasonsBest2020()
            ->where('sex', 'm')
            ->where('track_events.meters', 1600)
            ->get();
    }

    public function femaleAthletesBest3200m2020()
    {
        return $this->seasonsBest2020()
            ->where('sex', 'f')
            ->where('track_events.meters', 3200)
            ->get();
    }

    public function maleAthletesBest3200m2020()
    {
        return $this->seasonsBest2020()
            ->where('sex', 'm')
            ->where('track_events.meters', 3200)
            ->get();
    }
}
