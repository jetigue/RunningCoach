<?php

namespace App\Repositories;

use App\Models\Meets\CrossCountryMeet;

class CrossCountryMeets
{
    public function crossCountryMeets2019()
    {
        return $crossCountryMeets2019 = CrossCountryMeet::with('host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2019')
            ->get();
    }

    public function crossCountryMeets2018()
    {
        return $crossCountryMeets2018 = CrossCountryMeet::with('host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2018')
            ->get();
    }

    public function crossCountryMeets2017()
    {
        return $crossCountryMeets2017 = CrossCountryMeet::with('host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2017')
            ->get();
    }

    public function crossCountryMeets2016()
    {
        return $crossCountryMeets2016 = CrossCountryMeet::with('host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2016')
            ->get();
    }

    public function crossCountryMeets2015()
    {
        return $crossCountryMeets2015 = CrossCountryMeet::with('host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2015')
            ->get();
    }

    public function crossCountryMeets2014()
    {
        return $crossCountryMeets2014 = CrossCountryMeet::with('host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2014')
            ->get();
    }

    public function crossCountryMeets2013()
    {
        return $crossCountryMeets2013 = CrossCountryMeet::with('host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2013')
            ->get();
    }

    public function crossCountryMeets2012()
    {
        return $crossCountryMeets2012 = CrossCountryMeet::with('host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2012')
            ->get();
    }

    public function crossCountryMeets2011()
    {
        return $crossCountryMeets2011 = CrossCountryMeet::with('host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2011')
            ->get();
    }

    public function crossCountryMeets2010()
    {
        return $crossCountryMeets2010 = CrossCountryMeet::with('host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2010')
            ->get();
    }

    public function crossCountryMeets2009()
    {
        return $crossCountryMeets2009 = CrossCountryMeet::with('host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->whereYear('meet_date', '2009')
            ->get();
    }

    public function crossCountryMeets()
    {
        return $crossCountryMeets = CrossCountryMeet::with('host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->get();
    }


}
