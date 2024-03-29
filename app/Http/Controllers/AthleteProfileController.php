<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Results\CrossCountry\Result;
use App\Repositories\AthleteCCResults;
use App\Repositories\AthleteTrackResults;

class AthleteProfileController extends Controller
{
    public function show(Athlete $athlete, AthleteCCResults $crossResults, AthleteTrackResults $trackResults)
    {
        $crossResults2021 = $crossResults->crossResults2021($athlete);
        $crossResults2020 = $crossResults->crossResults2020($athlete);
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
        $track400mResults2021 = $trackResults->track400mResults2021($athlete);
        $track800mResults2021 = $trackResults->track800mResults2021($athlete);
        $track1000mResults2021 = $trackResults->track1000mResults2021($athlete);
        $track1200mResults2021 = $trackResults->track1200mResults2021($athlete);
        $track1500mResults2021 = $trackResults->track1500mResults2021($athlete);
        $track1600mResults2021 = $trackResults->track1600mResults2021($athlete);
        $track1mileResults2021 = $trackResults->track1mileResults2021($athlete);
        $track3000mResults2021 = $trackResults->track3000mResults2021($athlete);
        $track3200mResults2021 = $trackResults->track3200mResults2021($athlete);
        $track2mileResults2021 = $trackResults->track2mileResults2021($athlete);
        $track5000mResults2021 = $trackResults->track5000mResults2021($athlete);
        $track400mResults2020 = $trackResults->track400mResults2020($athlete);
        $track800mResults2020 = $trackResults->track800mResults2020($athlete);
        $track1000mResults2020 = $trackResults->track1000mResults2020($athlete);
        $track1200mResults2020 = $trackResults->track1200mResults2020($athlete);
        $track1500mResults2020 = $trackResults->track1500mResults2020($athlete);
        $track1600mResults2020 = $trackResults->track1600mResults2020($athlete);
        $track1mileResults2020 = $trackResults->track1mileResults2020($athlete);
        $track3000mResults2020 = $trackResults->track3000mResults2020($athlete);
        $track3200mResults2020 = $trackResults->track3200mResults2020($athlete);
        $track2mileResults2020 = $trackResults->track2mileResults2020($athlete);
        $track5000mResults2020 = $trackResults->track5000mResults2020($athlete);
        $track400mResults2019 = $trackResults->track400mResults2019($athlete);
        $track800mResults2019 = $trackResults->track800mResults2019($athlete);
        $track1000mResults2019 = $trackResults->track1000mResults2019($athlete);
        $track1200mResults2019 = $trackResults->track1200mResults2019($athlete);
        $track1500mResults2019 = $trackResults->track1500mResults2019($athlete);
        $track1600mResults2019 = $trackResults->track1600mResults2019($athlete);
        $track1mileResults2019 = $trackResults->track1mileResults2019($athlete);
        $track3000mResults2019 = $trackResults->track3000mResults2019($athlete);
        $track3200mResults2019 = $trackResults->track3200mResults2019($athlete);
        $track2mileResults2019 = $trackResults->track2mileResults2019($athlete);
        $track5000mResults2019 = $trackResults->track5000mResults2019($athlete);
        $track400mResults2018 = $trackResults->track400mResults2018($athlete);
        $track800mResults2018 = $trackResults->track800mResults2018($athlete);
        $track1000mResults2018 = $trackResults->track1000mResults2018($athlete);
        $track1200mResults2018 = $trackResults->track1200mResults2018($athlete);
        $track1500mResults2018 = $trackResults->track1500mResults2018($athlete);
        $track1600mResults2018 = $trackResults->track1600mResults2018($athlete);
        $track1mileResults2018 = $trackResults->track1mileResults2018($athlete);
        $track3000mResults2018 = $trackResults->track3000mResults2018($athlete);
        $track3200mResults2018 = $trackResults->track3200mResults2018($athlete);
        $track2mileResults2018 = $trackResults->track2mileResults2018($athlete);
        $track5000mResults2018 = $trackResults->track5000mResults2018($athlete);
        $track400mResults2017 = $trackResults->track400mResults2017($athlete);
        $track800mResults2017 = $trackResults->track800mResults2017($athlete);
        $track1000mResults2017 = $trackResults->track1000mResults2017($athlete);
        $track1200mResults2017 = $trackResults->track1200mResults2017($athlete);
        $track1500mResults2017 = $trackResults->track1500mResults2017($athlete);
        $track1600mResults2017 = $trackResults->track1600mResults2017($athlete);
        $track1mileResults2017 = $trackResults->track1mileResults2017($athlete);
        $track3000mResults2017 = $trackResults->track3000mResults2017($athlete);
        $track3200mResults2017 = $trackResults->track3200mResults2017($athlete);
        $track2mileResults2017 = $trackResults->track2mileResults2017($athlete);
        $track5000mResults2017 = $trackResults->track5000mResults2017($athlete);
        $track400mResults2016 = $trackResults->track400mResults2016($athlete);
        $track800mResults2016 = $trackResults->track800mResults2016($athlete);
        $track1000mResults2016 = $trackResults->track1000mResults2016($athlete);
        $track1200mResults2016 = $trackResults->track1200mResults2016($athlete);
        $track1500mResults2016 = $trackResults->track1500mResults2016($athlete);
        $track1600mResults2016 = $trackResults->track1600mResults2016($athlete);
        $track1mileResults2016 = $trackResults->track1mileResults2016($athlete);
        $track3000mResults2016 = $trackResults->track3000mResults2016($athlete);
        $track3200mResults2016 = $trackResults->track3200mResults2016($athlete);
        $track2mileResults2016 = $trackResults->track2mileResults2016($athlete);
        $track5000mResults2016 = $trackResults->track5000mResults2016($athlete);
        $track400mResults2015 = $trackResults->track400mResults2015($athlete);
        $track800mResults2015 = $trackResults->track800mResults2015($athlete);
        $track1000mResults2015 = $trackResults->track1000mResults2015($athlete);
        $track1200mResults2015 = $trackResults->track1200mResults2015($athlete);
        $track1500mResults2015 = $trackResults->track1500mResults2015($athlete);
        $track1600mResults2015 = $trackResults->track1600mResults2015($athlete);
        $track1mileResults2015 = $trackResults->track1mileResults2015($athlete);
        $track3000mResults2015 = $trackResults->track3000mResults2015($athlete);
        $track3200mResults2015 = $trackResults->track3200mResults2015($athlete);
        $track2mileResults2015 = $trackResults->track2mileResults2015($athlete);
        $track5000mResults2015 = $trackResults->track5000mResults2015($athlete);
        $track400mResults2014 = $trackResults->track400mResults2014($athlete);
        $track800mResults2014 = $trackResults->track800mResults2014($athlete);
        $track1000mResults2014 = $trackResults->track1000mResults2014($athlete);
        $track1200mResults2014 = $trackResults->track1200mResults2014($athlete);
        $track1500mResults2014 = $trackResults->track1500mResults2014($athlete);
        $track1600mResults2014 = $trackResults->track1600mResults2014($athlete);
        $track1mileResults2014 = $trackResults->track1mileResults2014($athlete);
        $track3000mResults2014 = $trackResults->track3000mResults2014($athlete);
        $track3200mResults2014 = $trackResults->track3200mResults2014($athlete);
        $track2mileResults2014 = $trackResults->track2mileResults2014($athlete);
        $track5000mResults2014 = $trackResults->track5000mResults2014($athlete);
        $track400mResults2013 = $trackResults->track400mResults2013($athlete);
        $track800mResults2013 = $trackResults->track800mResults2013($athlete);
        $track1000mResults2013 = $trackResults->track1000mResults2013($athlete);
        $track1200mResults2013 = $trackResults->track1200mResults2013($athlete);
        $track1500mResults2013 = $trackResults->track1500mResults2013($athlete);
        $track1600mResults2013 = $trackResults->track1600mResults2013($athlete);
        $track1mileResults2013 = $trackResults->track1mileResults2013($athlete);
        $track3000mResults2013 = $trackResults->track3000mResults2013($athlete);
        $track3200mResults2013 = $trackResults->track3200mResults2013($athlete);
        $track2mileResults2013 = $trackResults->track2mileResults2013($athlete);
        $track5000mResults2013 = $trackResults->track5000mResults2013($athlete);
        $track400mResults2012 = $trackResults->track400mResults2012($athlete);
        $track800mResults2012 = $trackResults->track800mResults2012($athlete);
        $track1000mResults2012 = $trackResults->track1000mResults2012($athlete);
        $track1200mResults2012 = $trackResults->track1200mResults2012($athlete);
        $track1500mResults2012 = $trackResults->track1500mResults2012($athlete);
        $track1600mResults2012 = $trackResults->track1600mResults2012($athlete);
        $track1mileResults2012 = $trackResults->track1mileResults2012($athlete);
        $track3000mResults2012 = $trackResults->track3000mResults2012($athlete);
        $track3200mResults2012 = $trackResults->track3200mResults2012($athlete);
        $track2mileResults2012 = $trackResults->track2mileResults2012($athlete);
        $track5000mResults2012 = $trackResults->track5000mResults2012($athlete);
        $track400mResults2011 = $trackResults->track400mResults2011($athlete);
        $track800mResults2011 = $trackResults->track800mResults2011($athlete);
        $track1000mResults2011 = $trackResults->track1000mResults2011($athlete);
        $track1200mResults2011 = $trackResults->track1200mResults2011($athlete);
        $track1500mResults2011 = $trackResults->track1500mResults2011($athlete);
        $track1600mResults2011 = $trackResults->track1600mResults2011($athlete);
        $track1mileResults2011 = $trackResults->track1mileResults2011($athlete);
        $track3000mResults2011 = $trackResults->track3000mResults2011($athlete);
        $track3200mResults2011 = $trackResults->track3200mResults2011($athlete);
        $track2mileResults2011 = $trackResults->track2mileResults2011($athlete);
        $track5000mResults2011 = $trackResults->track5000mResults2011($athlete);
        $track400mResults2010 = $trackResults->track400mResults2010($athlete);
        $track800mResults2010 = $trackResults->track800mResults2010($athlete);
        $track1000mResults2010 = $trackResults->track1000mResults2010($athlete);
        $track1200mResults2010 = $trackResults->track1200mResults2010($athlete);
        $track1500mResults2010 = $trackResults->track1500mResults2010($athlete);
        $track1600mResults2010 = $trackResults->track1600mResults2010($athlete);
        $track1mileResults2010 = $trackResults->track1mileResults2010($athlete);
        $track3000mResults2010 = $trackResults->track3000mResults2010($athlete);
        $track3200mResults2010 = $trackResults->track3200mResults2010($athlete);
        $track2mileResults2010 = $trackResults->track2mileResults2010($athlete);
        $track5000mResults2010 = $trackResults->track5000mResults2010($athlete);
        $trackResults2021 = $trackResults->trackResults2021($athlete);
        $trackResults2020 = $trackResults->trackResults2020($athlete);
        $trackResults2019 = $trackResults->trackResults2019($athlete);
        $trackResults2018 = $trackResults->trackResults2018($athlete);
        $trackResults2017 = $trackResults->trackResults2017($athlete);
        $trackResults2016 = $trackResults->trackResults2016($athlete);
        $trackResults2015 = $trackResults->trackResults2015($athlete);
        $trackResults2014 = $trackResults->trackResults2014($athlete);
        $trackResults2013 = $trackResults->trackResults2013($athlete);
        $trackResults2012 = $trackResults->trackResults2012($athlete);
        $trackResults2011 = $trackResults->trackResults2011($athlete);
        $trackResults2010 = $trackResults->trackResults2010($athlete);

        $fiveKResults = Result::where('athlete_id', $athlete->id)
            ->join('cross_country_team_results', 'cross_country_results.cross_country_team_result_id', '=', 'cross_country_team_results.id')
            ->join('cross_country_events', 'cross_country_team_results.cross_country_event_id', '=', 'cross_country_events.id')
            ->join('cross_country_meets', 'cross_country_team_results.cross_country_meet_id', '=', 'cross_country_meets.id')
            ->where('cross_country_meets.meet_date', '>=', '2021-08-01')
            ->select('cross_country_results.total_seconds as seconds', 'cross_country_events.meters as meters')
            ->orderBy('seconds');

        $seasonBestCC5k = clone $fiveKResults->where('meters', '5000')->take(1)->get();

        $seasonBestTrack = \App\Models\Results\Track\Result::where('athlete_id', $athlete->id)
            ->join('track_team_results', 'track_results.track_team_result_id', '=', 'track_team_results.id')
            ->join('track_events', 'track_results.track_event_id', '=', 'track_events.id')
            ->join('track_meets', 'track_team_results.track_meet_id', '=', 'track_meets.id')
            ->where('track_meets.meet_date', '>=', '2021-01-01')
            ->select('track_results.total_seconds as seconds', 'track_events.meters as meters')
            ->orderBy('seconds');

        $seasonBestTrack2 = clone $seasonBestTrack;
        $seasonBestTrack3 = clone $seasonBestTrack;

        $seasonBest1500m = clone $seasonBestTrack->where('meters', '1500')->take(1)->get();
        $seasonBest1600m = clone $seasonBestTrack2->where('meters', '1600')->take(1)->get();
        $seasonBest3200m = clone $seasonBestTrack3->where('meters', '3200')->take(1)->get();

        return view('profiles.athletes.show', compact(
            'athlete',
            'crossResults2021',
            'crossResults2020',
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
            'crossResults2009',
            'trackResults2019',
            'trackResults2018',
            'trackResults2017',
            'trackResults2016',
            'trackResults2015',
            'trackResults2014',
            'trackResults2013',
            'trackResults2012',
            'trackResults2011',
            'trackResults2010',
            'trackResults2020',
            'trackResults2021',
            'track400mResults2021',
            'track800mResults2021',
            'track1000mResults2021',
            'track1200mResults2021',
            'track1500mResults2021',
            'track1600mResults2021',
            'track1mileResults2021',
            'track3000mResults2021',
            'track3200mResults2021',
            'track2mileResults2021',
            'track5000mResults2021',
            'track400mResults2020',
            'track800mResults2020',
            'track1000mResults2020',
            'track1200mResults2020',
            'track1500mResults2020',
            'track1600mResults2020',
            'track1mileResults2020',
            'track3000mResults2020',
            'track3200mResults2020',
            'track2mileResults2020',
            'track5000mResults2020',
            'track400mResults2019',
            'track800mResults2019',
            'track1000mResults2019',
            'track1200mResults2019',
            'track1500mResults2019',
            'track1600mResults2019',
            'track1mileResults2019',
            'track3000mResults2019',
            'track3200mResults2019',
            'track2mileResults2019',
            'track5000mResults2019',
            'track400mResults2018',
            'track800mResults2018',
            'track1000mResults2018',
            'track1200mResults2018',
            'track1500mResults2018',
            'track1600mResults2018',
            'track1mileResults2018',
            'track3000mResults2018',
            'track3200mResults2018',
            'track2mileResults2018',
            'track5000mResults2018',
            'track400mResults2017',
            'track800mResults2017',
            'track1000mResults2017',
            'track1200mResults2017',
            'track1500mResults2017',
            'track1600mResults2017',
            'track1mileResults2017',
            'track3000mResults2017',
            'track3200mResults2017',
            'track2mileResults2017',
            'track5000mResults2017',
            'track400mResults2016',
            'track800mResults2016',
            'track1000mResults2016',
            'track1200mResults2016',
            'track1500mResults2016',
            'track1600mResults2016',
            'track1mileResults2016',
            'track3000mResults2016',
            'track3200mResults2016',
            'track2mileResults2016',
            'track5000mResults2016',
            'track400mResults2015',
            'track800mResults2015',
            'track1000mResults2015',
            'track1200mResults2015',
            'track1500mResults2015',
            'track1600mResults2015',
            'track1mileResults2015',
            'track3000mResults2015',
            'track3200mResults2015',
            'track2mileResults2015',
            'track5000mResults2015',
            'track400mResults2014',
            'track800mResults2014',
            'track1000mResults2014',
            'track1200mResults2014',
            'track1500mResults2014',
            'track1600mResults2014',
            'track1mileResults2014',
            'track3000mResults2014',
            'track3200mResults2014',
            'track2mileResults2014',
            'track5000mResults2014',
            'track400mResults2013',
            'track800mResults2013',
            'track1000mResults2013',
            'track1200mResults2013',
            'track1500mResults2013',
            'track1600mResults2013',
            'track1mileResults2013',
            'track3000mResults2013',
            'track3200mResults2013',
            'track2mileResults2013',
            'track5000mResults2013',
            'track400mResults2012',
            'track800mResults2012',
            'track1000mResults2012',
            'track1200mResults2012',
            'track1500mResults2012',
            'track1600mResults2012',
            'track1mileResults2012',
            'track3000mResults2012',
            'track3200mResults2012',
            'track2mileResults2012',
            'track5000mResults2012',
            'track400mResults2011',
            'track800mResults2011',
            'track1000mResults2011',
            'track1200mResults2011',
            'track1500mResults2011',
            'track1600mResults2011',
            'track1mileResults2011',
            'track3000mResults2011',
            'track3200mResults2011',
            'track2mileResults2011',
            'track5000mResults2011',
            'track400mResults2010',
            'track800mResults2010',
            'track1000mResults2010',
            'track1200mResults2010',
            'track1500mResults2010',
            'track1600mResults2010',
            'track1mileResults2010',
            'track3000mResults2010',
            'track3200mResults2010',
            'track2mileResults2010',
            'track5000mResults2010',
            'seasonBest1600m',
            'seasonBest1500m',
            'seasonBest3200m',
            'seasonBestCC5k'
        ));
    }
}
