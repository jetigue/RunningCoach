<?php

namespace App\Repositories;

use App\Models\Athlete;
use Carbon\Carbon;
use App\Models\Results\CrossCountry\Result;
use App\Models\Results\CrossCountry\TeamResult;

class AthleteCCResults
{
    public function crossResults2019(Athlete $athlete)
    {
        return $crossResults2019 = Result::where('athlete_id', $athlete->id)
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
            ->join('meet_names', 'cross_country_meets.meet_name_id', '=', 'meet_names.id')
            ->join('divisions', 'cross_country_team_results.division_id', '=', 'divisions.id')
            ->join('levels', 'divisions.level_id', '=', 'levels.id')
            ->join('events', 'cross_country_team_results.event_id', '=', 'events.id')
            ->select(
                'cross_country_results.*',
                'cross_country_meets.meet_date as date',
                'cross_country_meets.slug as slug',
                'cross_country_team_results.id as teamResultId',
                'meet_names.name',
                'levels.name as level',
                'events.name as event'
            )
            ->whereYear('cross_country_meets.meet_date', '2019')
            ->orderBy('date', 'desc')
            ->get();
    }

    public function crossResults2018(Athlete $athlete)
    {
        return $crossResults2018 = Result::where('athlete_id', $athlete->id)
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
            ->join('meet_names', 'cross_country_meets.meet_name_id', '=', 'meet_names.id')
            ->join('divisions', 'cross_country_team_results.division_id', '=', 'divisions.id')
            ->join('levels', 'divisions.level_id', '=', 'levels.id')
            ->join('events', 'cross_country_team_results.event_id', '=', 'events.id')
            ->select(
                'cross_country_results.*',
                'cross_country_meets.meet_date as date',
                'cross_country_meets.slug as slug',
                'cross_country_team_results.id as teamResultId',
                'meet_names.name',
                'levels.name as level',
                'events.name as event'
            )
            ->whereYear('cross_country_meets.meet_date', '2018')
            ->orderBy('date', 'desc')
            ->get();
    }

    public function crossResults2017(Athlete $athlete)
    {
        return $crossResults2017 = Result::where('athlete_id', $athlete->id)
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
            ->join('meet_names', 'cross_country_meets.meet_name_id', '=', 'meet_names.id')
            ->join('divisions', 'cross_country_team_results.division_id', '=', 'divisions.id')
            ->join('levels', 'divisions.level_id', '=', 'levels.id')
            ->join('events', 'cross_country_team_results.event_id', '=', 'events.id')
            ->select(
                'cross_country_results.*',
                'cross_country_meets.meet_date as date',
                'cross_country_meets.slug as slug',
                'cross_country_team_results.id as teamResultId',
                'meet_names.name',
                'levels.name as level',
                'events.name as event'
            )
            ->whereYear('cross_country_meets.meet_date', '2017')
            ->orderBy('date', 'desc')
            ->get();
    }

    public function crossResults2016(Athlete $athlete)
    {
        return $crossResults2016 = Result::where('athlete_id', $athlete->id)
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
            ->join('meet_names', 'cross_country_meets.meet_name_id', '=', 'meet_names.id')
            ->join('divisions', 'cross_country_team_results.division_id', '=', 'divisions.id')
            ->join('levels', 'divisions.level_id', '=', 'levels.id')
            ->join('events', 'cross_country_team_results.event_id', '=', 'events.id')
            ->select(
                'cross_country_results.*',
                'cross_country_meets.meet_date as date',
                'cross_country_meets.slug as slug',
                'cross_country_team_results.id as teamResultId',
                'meet_names.name',
                'levels.name as level',
                'events.name as event'
            )
            ->whereYear('cross_country_meets.meet_date', '2016')
            ->orderBy('date', 'desc')
            ->get();
    }

    public function crossResults2015(Athlete $athlete)
    {
        return $crossResults2015 = Result::where('athlete_id', $athlete->id)
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
            ->join('meet_names', 'cross_country_meets.meet_name_id', '=', 'meet_names.id')
            ->join('divisions', 'cross_country_team_results.division_id', '=', 'divisions.id')
            ->join('levels', 'divisions.level_id', '=', 'levels.id')
            ->join('events', 'cross_country_team_results.event_id', '=', 'events.id')
            ->select(
                'cross_country_results.*',
                'cross_country_meets.meet_date as date',
                'cross_country_meets.slug as slug',
                'cross_country_team_results.id as teamResultId',
                'meet_names.name',
                'levels.name as level',
                'events.name as event'
            )
            ->whereYear('cross_country_meets.meet_date', '2015')
            ->orderBy('date', 'desc')
            ->get();
    }

    public function crossResults2014(Athlete $athlete)
    {
        return $crossResults2014 = Result::where('athlete_id', $athlete->id)
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
            ->join('meet_names', 'cross_country_meets.meet_name_id', '=', 'meet_names.id')
            ->join('divisions', 'cross_country_team_results.division_id', '=', 'divisions.id')
            ->join('levels', 'divisions.level_id', '=', 'levels.id')
            ->join('events', 'cross_country_team_results.event_id', '=', 'events.id')
            ->select(
                'cross_country_results.*',
                'cross_country_meets.meet_date as date',
                'cross_country_meets.slug as slug',
                'cross_country_team_results.id as teamResultId',
                'meet_names.name',
                'levels.name as level',
                'events.name as event'
            )
            ->whereYear('cross_country_meets.meet_date', '2014')
            ->orderBy('date', 'desc')
            ->get();
    }

    public function crossResults2013(Athlete $athlete)
    {
        return $crossResults2013 = Result::where('athlete_id', $athlete->id)
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
            ->join('meet_names', 'cross_country_meets.meet_name_id', '=', 'meet_names.id')
            ->join('divisions', 'cross_country_team_results.division_id', '=', 'divisions.id')
            ->join('levels', 'divisions.level_id', '=', 'levels.id')
            ->join('events', 'cross_country_team_results.event_id', '=', 'events.id')
            ->select(
                'cross_country_results.*',
                'cross_country_meets.meet_date as date',
                'cross_country_meets.slug as slug',
                'cross_country_team_results.id as teamResultId',
                'meet_names.name',
                'levels.name as level',
                'events.name as event'
            )
            ->whereYear('cross_country_meets.meet_date', '2013')
            ->orderBy('date', 'desc')
            ->get();
    }

    public function crossResults2012(Athlete $athlete)
    {
        return $crossResults2012 = Result::where('athlete_id', $athlete->id)
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
            ->join('meet_names', 'cross_country_meets.meet_name_id', '=', 'meet_names.id')
            ->join('divisions', 'cross_country_team_results.division_id', '=', 'divisions.id')
            ->join('levels', 'divisions.level_id', '=', 'levels.id')
            ->join('events', 'cross_country_team_results.event_id', '=', 'events.id')
            ->select(
                'cross_country_results.*',
                'cross_country_meets.meet_date as date',
                'cross_country_meets.slug as slug',
                'cross_country_team_results.id as teamResultId',
                'meet_names.name',
                'levels.name as level',
                'events.name as event'
            )
            ->whereYear('cross_country_meets.meet_date', '2012')
            ->orderBy('date', 'desc')
            ->get();
    }

    public function crossResults2011(Athlete $athlete)
    {
        return $crossResults2011 = Result::where('athlete_id', $athlete->id)
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
            ->join('meet_names', 'cross_country_meets.meet_name_id', '=', 'meet_names.id')
            ->join('divisions', 'cross_country_team_results.division_id', '=', 'divisions.id')
            ->join('levels', 'divisions.level_id', '=', 'levels.id')
            ->join('events', 'cross_country_team_results.event_id', '=', 'events.id')
            ->select(
                'cross_country_results.*',
                'cross_country_meets.meet_date as date',
                'cross_country_meets.slug as slug',
                'cross_country_team_results.id as teamResultId',
                'meet_names.name',
                'levels.name as level',
                'events.name as event'
            )
            ->whereYear('cross_country_meets.meet_date', '2011')
            ->orderBy('date', 'desc')
            ->get();
    }

    public function crossResults2010(Athlete $athlete)
    {
        return $crossResults2010 = Result::where('athlete_id', $athlete->id)
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
            ->join('meet_names', 'cross_country_meets.meet_name_id', '=', 'meet_names.id')
            ->join('divisions', 'cross_country_team_results.division_id', '=', 'divisions.id')
            ->join('levels', 'divisions.level_id', '=', 'levels.id')
            ->join('events', 'cross_country_team_results.event_id', '=', 'events.id')
            ->select(
                'cross_country_results.*',
                'cross_country_meets.meet_date as date',
                'cross_country_meets.slug as slug',
                'cross_country_team_results.id as teamResultId',
                'meet_names.name',
                'levels.name as level',
                'events.name as event'
            )
            ->whereYear('cross_country_meets.meet_date', '2010')
            ->orderBy('date', 'desc')
            ->get();
    }

    public function crossResults2009(Athlete $athlete)
    {
        return $crossResults2009 = Result::where('athlete_id', $athlete->id)
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
            ->join('meet_names', 'cross_country_meets.meet_name_id', '=', 'meet_names.id')
            ->join('divisions', 'cross_country_team_results.division_id', '=', 'divisions.id')
            ->join('levels', 'divisions.level_id', '=', 'levels.id')
            ->join('events', 'cross_country_team_results.event_id', '=', 'events.id')
            ->select(
                'cross_country_results.*',
                'cross_country_meets.meet_date as date',
                'cross_country_meets.slug as slug',
                'cross_country_team_results.id as teamResultId',
                'meet_names.name',
                'levels.name as level',
                'events.name as event'
            )
            ->whereYear('cross_country_meets.meet_date', '2009')
            ->orderBy('date', 'desc')
            ->get();
    }
}
