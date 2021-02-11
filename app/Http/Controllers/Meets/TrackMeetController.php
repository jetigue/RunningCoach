<?php

namespace App\Http\Controllers\Meets;

use App\Http\Controllers\Controller;
use App\Models\Meets\TrackMeet;
use App\Repositories\TrackMeets;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TrackMeetController extends Controller
{
    /**
     * @param TrackMeets $meets
     * @return Factory|View
     */
    public function index(TrackMeets $meets)
    {
        $trackMeets2021 = $meets->trackMeets2021();
        $trackMeets2020 = $meets->trackMeets2020();
        $trackMeets2019 = $meets->trackMeets2019();
        $trackMeets2018 = $meets->trackMeets2018();
        $trackMeets2017 = $meets->trackMeets2017();
        $trackMeets2016 = $meets->trackMeets2016();
        $trackMeets2015 = $meets->trackMeets2015();
        $trackMeets2014 = $meets->trackMeets2014();
        $trackMeets2013 = $meets->trackMeets2013();
        $trackMeets2012 = $meets->trackMeets2012();
        $trackMeets2011 = $meets->trackMeets2011();
        $trackMeets2010 = $meets->trackMeets2010();
        $trackMeets = $meets->trackMeets();

        return view('meets.track.index', compact(
            'trackMeets2021',
            'trackMeets2020',
            'trackMeets2019',
            'trackMeets2018',
            'trackMeets2017',
            'trackMeets2016',
            'trackMeets2015',
            'trackMeets2014',
            'trackMeets2013',
            'trackMeets2012',
            'trackMeets2011',
            'trackMeets2010',
            'trackMeets'
        ));
    }

    /**
     * @param TrackMeet $trackMeet
     * @return Factory|View
     */
    public function show(TrackMeet $trackMeet)
    {
        return view('meets.track.show', compact('trackMeet'));
    }
}
