<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Results\CrossCountry\Result;
use App\Repositories\AthleteCCResults;


class AthleteProfileController extends Controller
{
    public function show(Athlete $athlete, AthleteCCResults $crossResults)
    {
        $crossResults2019 = $crossResults->crossResults2019($athlete);
        $crossResults2018 = $crossResults->crossResults2018($athlete);
        $crossResults2017 = $crossResults->crossResults2017($athlete);
        $crossResults2016 = $crossResults->crossResults2016($athlete);
        $crossResults2015 = $crossResults->crossResults2015($athlete);
        $crossResults2014 = $crossResults->crossResults2014($athlete);
        $crossResults2013 = $crossResults->crossResults2013($athlete);
        $crossResults2012 = $crossResults->crossResults2012($athlete);
        $crossResults2011 = $crossResults->crossResults2011($athlete);
        $crossResults2010 = $crossResults->crossResults2010($athlete);
        $crossResults2009 = $crossResults->crossResults2009($athlete);

        $fiveKResults= Result::where('athlete_id', $athlete->id)
            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
            ->join('events', 'cross_country_team_results.event_id', '=', 'events.id')
            ->where('events.name', '5k')
            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
            ->where('cross_country_meets.meet_date', '>=', '2019-08-01')
            ->select('cross_country_results.total_seconds', 'events.meters')
            ->get();

        $seasonBest5k = $fiveKResults->min('total_seconds');

        return view('profiles.athletes.show', compact(
            'athlete',
            'seasonBest5k',
            'crossResults2019',
            'crossResults2018',
            'crossResults2017',
            'crossResults2016',
            'crossResults2015',
            'crossResults2014',
            'crossResults2013',
            'crossResults2012',
            'crossResults2011',
            'crossResults2010',
            'crossResults2009'
        ));
    }
}
