<?php

namespace App\Repositories;

use App\Models\Athlete;
use App\Models\Results\CrossCountry\Result;
use App\Models\Results\CrossCountry\TeamResult;
use Carbon\Carbon;

class AthleteCCResults
{
    /**
     * @param Athlete $athlete
     * @return mixed
     */
    public function crossResults(Athlete $athlete)
    {
        return $crossResults = Result::where('athlete_id', $athlete->id)
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
            ->join('cross_country_meet_names', 'cross_country_meets.cross_country_meet_name_id', '=', 'cross_country_meet_names.id')
            ->join('divisions', 'cross_country_team_results.division_id', '=', 'divisions.id')
            ->join('levels', 'divisions.level_id', '=', 'levels.id')
            ->join('cross_country_events', 'cross_country_team_results.cross_country_event_id', '=', 'cross_country_events.id')
            ->select(
                'cross_country_results.*',
                'cross_country_meets.meet_date as date',
                'cross_country_meets.slug as slug',
                'cross_country_team_results.id as teamResultId',
                'cross_country_meet_names.name',
                'levels.name as level',
                'cross_country_events.name as event'
            )
            ->orderBy('date', 'desc');
    }
        /**
     * @param Athlete $athlete
     * @return mixed
     */
    public function crossResults2021(Athlete $athlete)
    {
        return clone $this->crossResults($athlete)
            ->whereYear('cross_country_meets.meet_date', '2021')
            ->get();
    }

    /**
     * @param Athlete $athlete
     * @return mixed
     */
    public function crossResults2020(Athlete $athlete)
    {
        return clone $this->crossResults($athlete)
            ->whereYear('cross_country_meets.meet_date', '2020')
            ->get();
    }

    /**
     * @param Athlete $athlete
     * @return mixed
     */
    public function crossResults2019(Athlete $athlete)
    {
        return clone $this->crossResults($athlete)
            ->whereYear('cross_country_meets.meet_date', '2019')
            ->get();
    }

    /**
     * @param Athlete $athlete
     * @return mixed
     */
    public function crossResults2018(Athlete $athlete)
    {
        return clone $this->crossResults($athlete)
            ->whereYear('cross_country_meets.meet_date', '2018')
            ->get();
    }

    /**
     * @param Athlete $athlete
     * @return mixed
     */
    public function crossResults2017(Athlete $athlete)
    {
        return clone $this->crossResults($athlete)
            ->whereYear('cross_country_meets.meet_date', '2017')
            ->get();
    }

    /**
     * @param Athlete $athlete
     * @return mixed
     */
    public function crossResults2016(Athlete $athlete)
    {
        return clone $this->crossResults($athlete)
            ->whereYear('cross_country_meets.meet_date', '2016')
            ->get();
    }

    /**
     * @param Athlete $athlete
     * @return mixed
     */
    public function crossResults2015(Athlete $athlete)
    {
        return clone $this->crossResults($athlete)
            ->whereYear('cross_country_meets.meet_date', '2015')
            ->get();
    }

    /**
     * @param Athlete $athlete
     * @return mixed
     */
    public function crossResults2014(Athlete $athlete)
    {
        return clone $this->crossResults($athlete)
            ->whereYear('cross_country_meets.meet_date', '2014')
            ->get();
    }

    /**
     * @param Athlete $athlete
     * @return mixed
     */
    public function crossResults2013(Athlete $athlete)
    {
        return clone $this->crossResults($athlete)
            ->whereYear('cross_country_meets.meet_date', '2013')
            ->get();
    }

    /**
     * @param Athlete $athlete
     * @return mixed
     */
    public function crossResults2012(Athlete $athlete)
    {
        return clone $this->crossResults($athlete)
            ->whereYear('cross_country_meets.meet_date', '2012')
            ->get();
    }

    /**
     * @param Athlete $athlete
     * @return mixed
     */
    public function crossResults2011(Athlete $athlete)
    {
        return clone $this->crossResults($athlete)
            ->whereYear('cross_country_meets.meet_date', '2011')
            ->get();
    }

    /**
     * @param Athlete $athlete
     * @return mixed
     */
    public function crossResults2010(Athlete $athlete)
    {
        return clone $this->crossResults($athlete)
            ->whereYear('cross_country_meets.meet_date', '2010')
            ->get();
    }

    /**
     * @param Athlete $athlete
     * @return mixed
     */
    public function crossResults2009(Athlete $athlete)
    {
        return clone $this->crossResults($athlete)
            ->whereYear('cross_country_meets.meet_date', '2009')
            ->get();
    }
}
