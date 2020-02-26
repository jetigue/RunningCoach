<?php

namespace App\Repositories;

use App\Models\Athlete;
use App\Models\Properties\Races\Track\Event;
use App\Models\Results\Track\Result;


class AthleteTrackResults
{
    public function trackResults(Athlete $athlete)
    {
        return Result::where('athlete_id', $athlete->id)
            ->join('athletes', 'track_results.athlete_id', '=', 'athletes.id')
            ->join('track_team_results', 'track_results.track_team_result_id', '=', 'track_team_results.id')
            ->join('track_meets', 'track_team_results.track_meet_id', '=', 'track_meets.id')
            ->join('meet_names', 'track_meets.meet_name_id', '=', 'meet_names.id')
            ->join('divisions', 'track_team_results.division_id', '=', 'divisions.id')
            ->join('levels', 'divisions.level_id', '=', 'levels.id')
            ->join('track_events', 'track_results.track_event_id', '=', 'track_events.id')
            ->select(
                'track_results.*',
                'track_meets.meet_date as date',
                'track_meets.slug as slug',
                'track_team_results.id as teamResultId',
                'meet_names.name',
                'levels.name as level',
                'track_events.meters as meters',
                'track_events.id'
            )
            ->orderBy('date', 'desc');
    }

    public function trackResults2020(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->whereYear('track_meets.meet_date', '2020')
            ->get();
    }

    public function trackResults2019(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->whereYear('track_meets.meet_date', '2019')
            ->get();
    }

    public function trackResults2018(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->whereYear('track_meets.meet_date', '2018')
            ->get();
    }

    public function trackResults2017(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->whereYear('track_meets.meet_date', '2017')
            ->get();
    }

    public function trackResults2016(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->whereYear('track_meets.meet_date', '2016')
            ->get();
    }

    public function trackResults2015(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->whereYear('track_meets.meet_date', '2015')
            ->get();
    }

    public function trackResults2014(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->whereYear('track_meets.meet_date', '2014')
            ->get();
    }

    public function trackResults2013(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->whereYear('track_meets.meet_date', '2013')
            ->get();
    }

    public function trackResults2012(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->whereYear('track_meets.meet_date', '2012')
            ->get();
    }

    public function trackResults2011(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->whereYear('track_meets.meet_date', '2011')
            ->get();
    }

    public function trackResults2010(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->whereYear('track_meets.meet_date', '2010')
            ->get();
    }
    public function track400mResults2020(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '400')
            ->whereYear('track_meets.meet_date', '2020')
            ->get();
    }

    public function track800mResults2020(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '800')
            ->whereYear('track_meets.meet_date', '2020')
            ->get();
    }

    public function track1000mResults2020(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1000')
            ->whereYear('track_meets.meet_date', '2020')
            ->get();
    }

    public function track1200mResults2020(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1200')
            ->whereYear('track_meets.meet_date', '2020')
            ->get();
    }

    public function track1500mResults2020(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1500')
            ->whereYear('track_meets.meet_date', '2020')
            ->get();
    }

    public function track1600mResults2020(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1600')
            ->whereYear('track_meets.meet_date', '2020')
            ->get();
    }

    public function track1mileResults2020(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1609')
            ->whereYear('track_meets.meet_date', '2020')
            ->get();
    }

    public function track3000mResults2020(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3000')
            ->whereYear('track_meets.meet_date', '2020')
            ->get();
    }

    public function track3200mResults2020(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3200')
            ->whereYear('track_meets.meet_date', '2020')
            ->get();
    }

    public function track2mileResults2020(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3218')
            ->whereYear('track_meets.meet_date', '2020')
            ->get();
    }

    public function track5000mResults2020(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '5000')
            ->whereYear('track_meets.meet_date', '2020')
            ->get();
    }

    public function track400mResults2019(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '400')
            ->whereYear('track_meets.meet_date', '2019')
            ->get();
    }

    public function track800mResults2019(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '800')
            ->whereYear('track_meets.meet_date', '2019')
            ->get();
    }

    public function track1000mResults2019(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1000')
            ->whereYear('track_meets.meet_date', '2019')
            ->get();
    }

    public function track1200mResults2019(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1200')
            ->whereYear('track_meets.meet_date', '2019')
            ->get();
    }

    public function track1500mResults2019(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1500')
            ->whereYear('track_meets.meet_date', '2019')
            ->get();
    }

    public function track1600mResults2019(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1600')
            ->whereYear('track_meets.meet_date', '2019')
            ->get();
    }

    public function track1mileResults2019(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1609')
            ->whereYear('track_meets.meet_date', '2019')
            ->get();
    }

    public function track3000mResults2019(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3000')
            ->whereYear('track_meets.meet_date', '2019')
            ->get();
    }

    public function track3200mResults2019(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3200')
            ->whereYear('track_meets.meet_date', '2019')
            ->get();
    }

    public function track2mileResults2019(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3218')
            ->whereYear('track_meets.meet_date', '2019')
            ->get();
    }

    public function track5000mResults2019(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '5000')
            ->whereYear('track_meets.meet_date', '2019')
            ->get();
    }

    public function track400mResults2018(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '400')
            ->whereYear('track_meets.meet_date', '2018')
            ->get();
    }

    public function track800mResults2018(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '800')
            ->whereYear('track_meets.meet_date', '2018')
            ->get();
    }

    public function track1000mResults2018(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1000')
            ->whereYear('track_meets.meet_date', '2018')
            ->get();
    }

    public function track1200mResults2018(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1200')
            ->whereYear('track_meets.meet_date', '2018')
            ->get();
    }

    public function track1500mResults2018(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1500')
            ->whereYear('track_meets.meet_date', '2018')
            ->get();
    }
    public function track1600mResults2018(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1600')
            ->whereYear('track_meets.meet_date', '2018')
            ->get();
    }
    public function track1mileResults2018(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1609')
            ->whereYear('track_meets.meet_date', '2018')
            ->get();
    }

    public function track3000mResults2018(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3000')
            ->whereYear('track_meets.meet_date', '2018')
            ->get();
    }

    public function track3200mResults2018(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3200')
            ->whereYear('track_meets.meet_date', '2018')
            ->get();
    }

    public function track2mileResults2018(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3218')
            ->whereYear('track_meets.meet_date', '2018')
            ->get();
    }

    public function track5000mResults2018(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '5000')
            ->whereYear('track_meets.meet_date', '2018')
            ->get();
    }

    public function track400mResults2017(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '400')
            ->whereYear('track_meets.meet_date', '2017')
            ->get();
    }

    public function track800mResults2017(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '800')
            ->whereYear('track_meets.meet_date', '2017')
            ->get();
    }

    public function track1000mResults2017(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1000')
            ->whereYear('track_meets.meet_date', '2017')
            ->get();
    }

    public function track1200mResults2017(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1200')
            ->whereYear('track_meets.meet_date', '2017')
            ->get();
    }

    public function track1500mResults2017(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1500')
            ->whereYear('track_meets.meet_date', '2017')
            ->get();
    }

    public function track1600mResults2017(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1600')
            ->whereYear('track_meets.meet_date', '2017')
            ->get();
    }

    public function track1mileResults2017(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1609')
            ->whereYear('track_meets.meet_date', '2017')
            ->get();
    }

    public function track3000mResults2017(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3000')
            ->whereYear('track_meets.meet_date', '2017')
            ->get();
    }

    public function track3200mResults2017(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3200')
            ->whereYear('track_meets.meet_date', '2017')
            ->get();
    }

    public function track2mileResults2017(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3218')
            ->whereYear('track_meets.meet_date', '2017')
            ->get();
    }

    public function track5000mResults2017(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '5000')
            ->whereYear('track_meets.meet_date', '2017')
            ->get();
    }

    public function track400mResults2016(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '400')
            ->whereYear('track_meets.meet_date', '2016')
            ->get();
    }

    public function track800mResults2016(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '800')
            ->whereYear('track_meets.meet_date', '2016')
            ->get();
    }

    public function track1000mResults2016(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1000')
            ->whereYear('track_meets.meet_date', '2016')
            ->get();
    }

    public function track1200mResults2016(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1200')
            ->whereYear('track_meets.meet_date', '2016')
            ->get();
    }

    public function track1500mResults2016(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1500')
            ->whereYear('track_meets.meet_date', '2016')
            ->get();
    }

    public function track1600mResults2016(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1600')
            ->whereYear('track_meets.meet_date', '2016')
            ->get();
    }

    public function track1mileResults2016(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1609')
            ->whereYear('track_meets.meet_date', '2016')
            ->get();
    }

    public function track3000mResults2016(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3000')
            ->whereYear('track_meets.meet_date', '2016')
            ->get();
    }

    public function track3200mResults2016(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3200')
            ->whereYear('track_meets.meet_date', '2016')
            ->get();
    }

    public function track2mileResults2016(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3218')
            ->whereYear('track_meets.meet_date', '2016')
            ->get();
    }

    public function track5000mResults2016(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '5000')
            ->whereYear('track_meets.meet_date', '2016')
            ->get();
    }

    public function track400mResults2015(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '400')
            ->whereYear('track_meets.meet_date', '2015')
            ->get();
    }

    public function track800mResults2015(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '800')
            ->whereYear('track_meets.meet_date', '2015')
            ->get();
    }

    public function track1000mResults2015(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1000')
            ->whereYear('track_meets.meet_date', '2015')
            ->get();
    }

    public function track1200mResults2015(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1200')
            ->whereYear('track_meets.meet_date', '2015')
            ->get();
    }

    public function track1500mResults2015(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1500')
            ->whereYear('track_meets.meet_date', '2015')
            ->get();
    }

    public function track1600mResults2015(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1600')
            ->whereYear('track_meets.meet_date', '2015')
            ->get();
    }

    public function track1mileResults2015(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1609')
            ->whereYear('track_meets.meet_date', '2015')
            ->get();
    }

    public function track3000mResults2015(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3000')
            ->whereYear('track_meets.meet_date', '2015')
            ->get();
    }

    public function track3200mResults2015(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3200')
            ->whereYear('track_meets.meet_date', '2015')
            ->get();
    }

    public function track2mileResults2015(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3218')
            ->whereYear('track_meets.meet_date', '2015')
            ->get();
    }

    public function track5000mResults2015(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '5000')
            ->whereYear('track_meets.meet_date', '2015')
            ->get();
    }

    public function track400mResults2014(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '400')
            ->whereYear('track_meets.meet_date', '2014')
            ->get();
    }

    public function track800mResults2014(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '800')
            ->whereYear('track_meets.meet_date', '2014')
            ->get();
    }

    public function track1000mResults2014(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1000')
            ->whereYear('track_meets.meet_date', '2014')
            ->get();
    }

    public function track1200mResults2014(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1200')
            ->whereYear('track_meets.meet_date', '2014')
            ->get();
    }

    public function track1500mResults2014(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1500')
            ->whereYear('track_meets.meet_date', '2014')
            ->get();
    }

    public function track1600mResults2014(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1600')
            ->whereYear('track_meets.meet_date', '2014')
            ->get();
    }

    public function track1mileResults2014(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1609')
            ->whereYear('track_meets.meet_date', '2014')
            ->get();
    }

    public function track3000mResults2014(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3000')
            ->whereYear('track_meets.meet_date', '2014')
            ->get();
    }

    public function track3200mResults2014(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3200')
            ->whereYear('track_meets.meet_date', '2014')
            ->get();
    }

    public function track2mileResults2014(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3218')
            ->whereYear('track_meets.meet_date', '2014')
            ->get();
    }

    public function track5000mResults2014(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '5000')
            ->whereYear('track_meets.meet_date', '2014')
            ->get();
    }

    public function track400mResults2013(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '400')
            ->whereYear('track_meets.meet_date', '2013')
            ->get();
    }

    public function track800mResults2013(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '800')
            ->whereYear('track_meets.meet_date', '2013')
            ->get();
    }

    public function track1000mResults2013(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1000')
            ->whereYear('track_meets.meet_date', '2013')
            ->get();
    }

    public function track1200mResults2013(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1200')
            ->whereYear('track_meets.meet_date', '2013')
            ->get();
    }

    public function track1500mResults2013(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1500')
            ->whereYear('track_meets.meet_date', '2013')
            ->get();
    }

    public function track1600mResults2013(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1600')
            ->whereYear('track_meets.meet_date', '2013')
            ->get();
    }

    public function track1mileResults2013(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1609')
            ->whereYear('track_meets.meet_date', '2013')
            ->get();
    }

    public function track3000mResults2013(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3000')
            ->whereYear('track_meets.meet_date', '2013')
            ->get();
    }

    public function track3200mResults2013(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3200')
            ->whereYear('track_meets.meet_date', '2013')
            ->get();
    }

    public function track2mileResults2013(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3218')
            ->whereYear('track_meets.meet_date', '2013')
            ->get();
    }

    public function track5000mResults2013(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '5000')
            ->whereYear('track_meets.meet_date', '2013')
            ->get();
    }

    public function track400mResults2012(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '400')
            ->whereYear('track_meets.meet_date', '2012')
            ->get();
    }

    public function track800mResults2012(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '800')
            ->whereYear('track_meets.meet_date', '2012')
            ->get();
    }

    public function track1000mResults2012(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1000')
            ->whereYear('track_meets.meet_date', '2012')
            ->get();
    }

    public function track1200mResults2012(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1200')
            ->whereYear('track_meets.meet_date', '2012')
            ->get();
    }

    public function track1500mResults2012(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1500')
            ->whereYear('track_meets.meet_date', '2012')
            ->get();
    }

    public function track1600mResults2012(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1600')
            ->whereYear('track_meets.meet_date', '2012')
            ->get();
    }

    public function track1mileResults2012(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1609')
            ->whereYear('track_meets.meet_date', '2012')
            ->get();
    }

    public function track3000mResults2012(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3000')
            ->whereYear('track_meets.meet_date', '2012')
            ->get();
    }

    public function track3200mResults2012(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3200')
            ->whereYear('track_meets.meet_date', '2012')
            ->get();
    }

    public function track2mileResults2012(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3218')
            ->whereYear('track_meets.meet_date', '2012')
            ->get();
    }

    public function track5000mResults2012(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '5000')
            ->whereYear('track_meets.meet_date', '2019')
            ->get();
    }

    public function track400mResults2011(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '400')
            ->whereYear('track_meets.meet_date', '2011')
            ->get();
    }

    public function track800mResults2011(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '800')
            ->whereYear('track_meets.meet_date', '2011')
            ->get();
    }

    public function track1000mResults2011(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1000')
            ->whereYear('track_meets.meet_date', '2011')
            ->get();
    }

    public function track1200mResults2011(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1200')
            ->whereYear('track_meets.meet_date', '2011')
            ->get();
    }

    public function track1500mResults2011(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1500')
            ->whereYear('track_meets.meet_date', '2011')
            ->get();
    }

    public function track1600mResults2011(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1600')
            ->whereYear('track_meets.meet_date', '2011')
            ->get();
    }
    public function track1mileResults2011(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1609')
            ->whereYear('track_meets.meet_date', '2011')
            ->get();
    }

    public function track3000mResults2011(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3000')
            ->whereYear('track_meets.meet_date', '2011')
            ->get();
    }

    public function track3200mResults2011(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3200')
            ->whereYear('track_meets.meet_date', '2011')
            ->get();
    }

    public function track2mileResults2011(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3218')
            ->whereYear('track_meets.meet_date', '2011')
            ->get();
    }

    public function track5000mResults2011(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '5000')
            ->whereYear('track_meets.meet_date', '2011')
            ->get();
    }

    public function track400mResults2010(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '400')
            ->whereYear('track_meets.meet_date', '2010')
            ->get();
    }

    public function track800mResults2010(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '800')
            ->whereYear('track_meets.meet_date', '2010')
            ->get();
    }

    public function track1000mResults2010(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1000')
            ->whereYear('track_meets.meet_date', '2010')
            ->get();
    }

    public function track1200mResults2010(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1200')
            ->whereYear('track_meets.meet_date', '2010')
            ->get();
    }

    public function track1500mResults2010(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1500')
            ->whereYear('track_meets.meet_date', '2010')
            ->get();
    }
    public function track1600mResults2010(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1600')
            ->whereYear('track_meets.meet_date', '2010')
            ->get();
    }
    public function track1mileResults2010(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '1609')
            ->whereYear('track_meets.meet_date', '2010')
            ->get();
    }

    public function track3000mResults2010(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3000')
            ->whereYear('track_meets.meet_date', '2010')
            ->get();
    }

    public function track3200mResults2010(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3200')
            ->whereYear('track_meets.meet_date', '2010')
            ->get();
    }

    public function track2mileResults2010(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '3218')
            ->whereYear('track_meets.meet_date', '2010')
            ->get();
    }

    public function track5000mResults2010(Athlete $athlete)
    {
        return clone $this->trackResults($athlete)
            ->where('meters', '5000')
            ->whereYear('track_meets.meet_date', '2010')
            ->get();
    }
}
