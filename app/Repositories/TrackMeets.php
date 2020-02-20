<?php

namespace App\Repositories;

use App\Models\Meets\TrackMeet;

class TrackMeets
{

    public function trackMeets2020()
    {
        return $trackMeets2019 = TrackMeet::with('host', 'season', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2020')
            ->get();
    }

    public function trackMeets2019()
    {
        return $trackMeets2019 = TrackMeet::with('host', 'season', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2019')
            ->get();
    }

    public function trackMeets2018()
    {
        return $trackMeets2018 = TrackMeet::with('host', 'season', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2018')
            ->get();
    }

    public function trackMeets2017()
    {
        return $trackMeets2017 = TrackMeet::with('host', 'season', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2017')
            ->get();
    }

    public function trackMeets2016()
    {
        return $trackMeets2016 = TrackMeet::with('host', 'season', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2016')
            ->get();
    }

    public function trackMeets2015()
    {
        return $trackMeets2015 = TrackMeet::with('host', 'season', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2015')
            ->get();
    }

    public function trackMeets2014()
    {
        return $trackMeets2014 = TrackMeet::with('host', 'season', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2014')
            ->get();
    }

    public function trackMeets2013()
    {
        return $trackMeets2013 = TrackMeet::with('host', 'season', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2013')
            ->get();
    }

    public function trackMeets2012()
    {
        return $trackMeets2012 = TrackMeet::with('host', 'season', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2012')
            ->get();
    }

    public function trackMeets2011()
    {
        return $trackMeets2011 = TrackMeet::with('host', 'season', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2011')
            ->get();
    }

    public function trackMeets2010()
    {
        return $trackMeets2010 = TrackMeet::with('host', 'season', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2010')
            ->get();
    }

    public function trackMeets()
    {
        return $trackMeets = TrackMeet::with('host', 'season', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->get();
    }

}
