<?php

namespace App\Repositories;

use App\Models\Athlete;
use App\Models\Properties\Meets\CrossCountry\Venue;
use App\Models\Results\CrossCountry\Result;
use Carbon\Carbon;

class CCVenueRecords
{
    public function fastestBoys(Venue $venue)
    {
        return $fastestBoys = Result::orderBy('total_seconds', 'asc')->orderBy('milliseconds', 'asc')
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_team_results.id', '=', 'cross_country_results.cross_country_team_result_id')
            ->join('cross_country_meets', 'cross_country_meets.id', '=', 'cross_country_team_results.cross_country_meet_id')
            ->join('cross_country_venues', 'cross_country_venues.id', '=', 'cross_country_meets.cross_country_venue_id')
            ->join('cross_country_events', 'cross_country_events.id', '=', 'cross_country_team_results.cross_country_event_id')
            ->join('meet_names', 'meet_names.id', '=', 'cross_country_meets.meet_name_id')
            ->where('cross_country_venues.id', $venue->id)
            ->where('cross_country_events.meters', 5000)
            ->where('athletes.sex', 'm')
            ->select(
                'cross_country_results.total_seconds',
                'cross_country_results.milliseconds',
                'cross_country_results.place',
                'athletes.first_name as firstName',
                'athletes.last_name as lastName',
                'athletes.grad_year',
                'athletes.id as athlete_id',
                'cross_country_meets.id as meet_id',
                'cross_country_meets.meet_date as date',
                'meet_names.name as meet'
            )
            ->limit(50)
            ->get();
    }

    public function fastestGirls(Venue $venue)
    {
        return $fastestGirls = Result::orderBy('total_seconds', 'asc')->orderBy('milliseconds', 'asc')
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_team_results.id', '=', 'cross_country_results.cross_country_team_result_id')
            ->join('cross_country_meets', 'cross_country_meets.id', '=', 'cross_country_team_results.cross_country_meet_id')
            ->join('cross_country_venues', 'cross_country_venues.id', '=', 'cross_country_meets.cross_country_venue_id')
            ->join('cross_country_events', 'cross_country_events.id', '=', 'cross_country_team_results.cross_country_event_id')
            ->join('meet_names', 'meet_names.id', '=', 'cross_country_meets.meet_name_id')
            ->where('cross_country_venues.id', $venue->id)
            ->where('cross_country_events.meters', 5000)
            ->where('athletes.sex', 'f')
            ->select(
                'cross_country_results.total_seconds',
                'cross_country_results.milliseconds',
                'cross_country_results.place',
                'athletes.first_name as firstName',
                'athletes.last_name as lastName',
                'athletes.grad_year',
                'athletes.id as athlete_id',
                'cross_country_meets.id as meet_id',
                'cross_country_meets.meet_date as date',
                'meet_names.name as meet'
            )
            ->limit(50)
            ->get();
    }

    public function fastestSeniorBoys(Venue $venue)
    {
        return $fastestSeniorBoys = Result::orderBy('total_seconds', 'asc')->orderBy('milliseconds', 'asc')
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_team_results.id', '=', 'cross_country_results.cross_country_team_result_id')
            ->join('cross_country_meets', 'cross_country_meets.id', '=', 'cross_country_team_results.cross_country_meet_id')
            ->join('cross_country_venues', 'cross_country_venues.id', '=', 'cross_country_meets.cross_country_venue_id')
            ->join('cross_country_events', 'cross_country_events.id', '=', 'cross_country_team_results.cross_country_event_id')
            ->join('meet_names', 'meet_names.id', '=', 'cross_country_meets.meet_name_id')
            ->where('cross_country_venues.id', $venue->id)
            ->where('cross_country_events.meters', 5000)
            ->where('athletes.sex', 'm')
            ->where('athletes.grad_year', '=', (new \Carbon\Carbon)->addYears(1, 'cross_country_meets.meet_date'))
            ->select(
                'cross_country_results.total_seconds',
                'cross_country_results.milliseconds',
                'cross_country_results.place',
                'athletes.first_name as firstName',
                'athletes.last_name as lastName',
                'athletes.grad_year',
                'athletes.id as athlete_id',
                'cross_country_meets.id as meet_id',
                'cross_country_meets.meet_date as date',
                'meet_names.name as meet'
            )
            ->limit(50)
            ->get();
    }

    public function fastestSeniorGirls(Venue $venue)
    {
        return $fastestSeniorBoys = Result::orderBy('total_seconds', 'asc')->orderBy('milliseconds', 'asc')
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_team_results.id', '=', 'cross_country_results.cross_country_team_result_id')
            ->join('cross_country_meets', 'cross_country_meets.id', '=', 'cross_country_team_results.cross_country_meet_id')
            ->join('cross_country_venues', 'cross_country_venues.id', '=', 'cross_country_meets.cross_country_venue_id')
            ->join('cross_country_events', 'cross_country_events.id', '=', 'cross_country_team_results.cross_country_event_id')
            ->join('meet_names', 'meet_names.id', '=', 'cross_country_meets.meet_name_id')
            ->where('cross_country_venues.id', $venue->id)
            ->where('cross_country_events.meters', 5000)
            ->where('athletes.sex', 'f')
            ->where('athletes.grad_year', '=', (new \Carbon\Carbon)->addYears(1, 'cross_country_meets.meet_date'))
            ->select(
                'cross_country_results.total_seconds',
                'cross_country_results.milliseconds',
                'cross_country_results.place',
                'athletes.first_name as firstName',
                'athletes.last_name as lastName',
                'athletes.grad_year',
                'athletes.id as athlete_id',
                'cross_country_meets.id as meet_id',
                'cross_country_meets.meet_date as date',
                'meet_names.name as meet'
            )
            ->limit(50)
            ->get();
    }

    public function fastestJuniorBoys(Venue $venue)
    {
        return $fastestJuniorBoys = Result::orderBy('total_seconds', 'asc')->orderBy('milliseconds', 'asc')
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_team_results.id', '=', 'cross_country_results.cross_country_team_result_id')
            ->join('cross_country_meets', 'cross_country_meets.id', '=', 'cross_country_team_results.cross_country_meet_id')
            ->join('cross_country_venues', 'cross_country_venues.id', '=', 'cross_country_meets.cross_country_venue_id')
            ->join('cross_country_events', 'cross_country_events.id', '=', 'cross_country_team_results.cross_country_event_id')
            ->join('meet_names', 'meet_names.id', '=', 'cross_country_meets.meet_name_id')
            ->where('cross_country_venues.id', $venue->id)
            ->where('cross_country_events.meters', 5000)
            ->where('athletes.sex', 'm')
            ->where('athletes.grad_year', '=', (new \Carbon\Carbon)->addYears(2, 'cross_country_meets.meet_date'))
            ->select(
                'cross_country_results.total_seconds',
                'cross_country_results.milliseconds',
                'cross_country_results.place',
                'athletes.first_name as firstName',
                'athletes.last_name as lastName',
                'athletes.grad_year',
                'athletes.id as athlete_id',
                'cross_country_meets.id as meet_id',
                'cross_country_meets.meet_date as date',
                'meet_names.name as meet'
            )
            ->limit(50)
            ->get();
    }

    public function fastestJuniorGirls(Venue $venue)
    {
        return $fastestJuniorGirls = Result::orderBy('total_seconds', 'asc')->orderBy('milliseconds', 'asc')
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_team_results.id', '=', 'cross_country_results.cross_country_team_result_id')
            ->join('cross_country_meets', 'cross_country_meets.id', '=', 'cross_country_team_results.cross_country_meet_id')
            ->join('cross_country_venues', 'cross_country_venues.id', '=', 'cross_country_meets.cross_country_venue_id')
            ->join('cross_country_events', 'cross_country_events.id', '=', 'cross_country_team_results.cross_country_event_id')
            ->join('meet_names', 'meet_names.id', '=', 'cross_country_meets.meet_name_id')
            ->where('cross_country_venues.id', $venue->id)
            ->where('cross_country_events.meters', 5000)
            ->where('athletes.sex', 'f')
            ->where('athletes.grad_year', '=', (new \Carbon\Carbon)->addYears(2, 'cross_country_meets.meet_date'))
            ->select(
                'cross_country_results.total_seconds',
                'cross_country_results.milliseconds',
                'cross_country_results.place',
                'athletes.first_name as firstName',
                'athletes.last_name as lastName',
                'athletes.grad_year',
                'athletes.id as athlete_id',
                'cross_country_meets.id as meet_id',
                'cross_country_meets.meet_date as date',
                'meet_names.name as meet'
            )
            ->limit(50)
            ->get();
    }

    public function fastestSophomoreBoys(Venue $venue)
    {
        return $fastestSophomoreBoys = Result::orderBy('total_seconds', 'asc')->orderBy('milliseconds', 'asc')
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_team_results.id', '=', 'cross_country_results.cross_country_team_result_id')
            ->join('cross_country_meets', 'cross_country_meets.id', '=', 'cross_country_team_results.cross_country_meet_id')
            ->join('cross_country_venues', 'cross_country_venues.id', '=', 'cross_country_meets.cross_country_venue_id')
            ->join('cross_country_events', 'cross_country_events.id', '=', 'cross_country_team_results.cross_country_event_id')
            ->join('meet_names', 'meet_names.id', '=', 'cross_country_meets.meet_name_id')
            ->where('cross_country_venues.id', $venue->id)
            ->where('cross_country_events.meters', 5000)
            ->where('athletes.sex', 'm')
            ->where('athletes.grad_year', '=', (new \Carbon\Carbon)->addYears(3, 'cross_country_meets.meet_date'))
            ->select(
                'cross_country_results.total_seconds',
                'cross_country_results.milliseconds',
                'cross_country_results.place',
                'athletes.first_name as firstName',
                'athletes.last_name as lastName',
                'athletes.grad_year',
                'athletes.id as athlete_id',
                'cross_country_meets.id as meet_id',
                'cross_country_meets.meet_date as date',
                'meet_names.name as meet'
            )
            ->limit(50)
            ->get();
    }

    public function fastestSophomoreGirls(Venue $venue)
    {
        return $fastestSophomoreGirls = Result::orderBy('total_seconds', 'asc')->orderBy('milliseconds', 'asc')
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_team_results.id', '=', 'cross_country_results.cross_country_team_result_id')
            ->join('cross_country_meets', 'cross_country_meets.id', '=', 'cross_country_team_results.cross_country_meet_id')
            ->join('cross_country_venues', 'cross_country_venues.id', '=', 'cross_country_meets.cross_country_venue_id')
            ->join('cross_country_events', 'cross_country_events.id', '=', 'cross_country_team_results.cross_country_event_id')
            ->join('meet_names', 'meet_names.id', '=', 'cross_country_meets.meet_name_id')
            ->where('cross_country_venues.id', $venue->id)
            ->where('cross_country_events.meters', 5000)
            ->where('athletes.sex', 'f')
            ->where('athletes.grad_year', '=', (new \Carbon\Carbon)->addYears(3, 'cross_country_meets.meet_date'))
            ->select(
                'cross_country_results.total_seconds',
                'cross_country_results.milliseconds',
                'cross_country_results.place',
                'athletes.first_name as firstName',
                'athletes.last_name as lastName',
                'athletes.grad_year',
                'athletes.id as athlete_id',
                'cross_country_meets.id as meet_id',
                'cross_country_meets.meet_date as date',
                'meet_names.name as meet'
            )
            ->limit(50)
            ->get();
    }

    public function fastestFreshmenBoys(Venue $venue)
    {
        return $fastestFreshmenBoys = Result::orderBy('total_seconds', 'asc')->orderBy('milliseconds', 'asc')
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_team_results.id', '=', 'cross_country_results.cross_country_team_result_id')
            ->join('cross_country_meets', 'cross_country_meets.id', '=', 'cross_country_team_results.cross_country_meet_id')
            ->join('cross_country_venues', 'cross_country_venues.id', '=', 'cross_country_meets.cross_country_venue_id')
            ->join('cross_country_events', 'cross_country_events.id', '=', 'cross_country_team_results.cross_country_event_id')
            ->join('meet_names', 'meet_names.id', '=', 'cross_country_meets.meet_name_id')
            ->where('cross_country_venues.id', $venue->id)
            ->where('cross_country_events.meters', 5000)
            ->where('athletes.sex', 'm')
            ->where('athletes.grad_year', '=', (new \Carbon\Carbon)->addYears(4, 'cross_country_meets.meet_date'))
            ->select(
                'cross_country_results.total_seconds',
                'cross_country_results.milliseconds',
                'cross_country_results.place',
                'athletes.first_name as firstName',
                'athletes.last_name as lastName',
                'athletes.grad_year',
                'athletes.id as athlete_id',
                'cross_country_meets.id as meet_id',
                'cross_country_meets.meet_date as date',
                'meet_names.name as meet'
            )
            ->limit(50)
            ->get();
    }

    public function fastestFreshmenGirls(Venue $venue)
    {
        return $fastestFreshmenGirls = Result::orderBy('total_seconds', 'asc')->orderBy('milliseconds', 'asc')
            ->join('athletes', 'cross_country_results.athlete_id', '=', 'athletes.id')
            ->join('cross_country_team_results', 'cross_country_team_results.id', '=', 'cross_country_results.cross_country_team_result_id')
            ->join('cross_country_meets', 'cross_country_meets.id', '=', 'cross_country_team_results.cross_country_meet_id')
            ->join('cross_country_venues', 'cross_country_venues.id', '=', 'cross_country_meets.cross_country_venue_id')
            ->join('cross_country_events', 'cross_country_events.id', '=', 'cross_country_team_results.cross_country_event_id')
            ->join('meet_names', 'meet_names.id', '=', 'cross_country_meets.meet_name_id')
            ->where('cross_country_venues.id', $venue->id)
            ->where('cross_country_events.meters', 5000)
            ->where('athletes.sex', 'f')
            ->where('athletes.grad_year', '=', (new \Carbon\Carbon)->addYears(4, 'cross_country_meets.meet_date'))
            ->select(
                'cross_country_results.total_seconds',
                'cross_country_results.milliseconds',
                'cross_country_results.place',
                'athletes.first_name as firstName',
                'athletes.last_name as lastName',
                'athletes.grad_year',
                'athletes.id as athlete_id',
                'cross_country_meets.id as meet_id',
                'cross_country_meets.meet_date as date',
                'meet_names.name as meet'
            )
            ->limit(50)
            ->get();
    }
}
