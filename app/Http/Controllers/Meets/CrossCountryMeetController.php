<?php

namespace App\Http\Controllers\Meets;

use App\Http\Controllers\Controller;
use App\Models\Meets\CrossCountryMeet;
use App\Repositories\CrossCountryMeets;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CrossCountryMeetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CrossCountryMeets $meets
     * @return Factory|View
     */
    public function index(CrossCountryMeets $meets)
    {
        $crossCountryMeets2020 = $meets->crossCountryMeets2020();
        $crossCountryMeets2019 = $meets->crossCountryMeets2019();
        $crossCountryMeets2018 = $meets->crossCountryMeets2018();
        $crossCountryMeets2017 = $meets->crossCountryMeets2017();
        $crossCountryMeets2016 = $meets->crossCountryMeets2016();
        $crossCountryMeets2015 = $meets->crossCountryMeets2015();
        $crossCountryMeets2014 = $meets->crossCountryMeets2014();
        $crossCountryMeets2013 = $meets->crossCountryMeets2013();
        $crossCountryMeets2012 = $meets->crossCountryMeets2012();
        $crossCountryMeets2011 = $meets->crossCountryMeets2011();
        $crossCountryMeets2010 = $meets->crossCountryMeets2010();
        $crossCountryMeets2009 = $meets->crossCountryMeets2009();
        $crossCountryMeets = $meets->crossCountryMeets();

        return view('meets.crossCountry.index', compact(
            'crossCountryMeets2020',
            'crossCountryMeets2019',
            'crossCountryMeets2018',
            'crossCountryMeets2017',
            'crossCountryMeets2016',
            'crossCountryMeets2015',
            'crossCountryMeets2014',
            'crossCountryMeets2013',
            'crossCountryMeets2012',
            'crossCountryMeets2011',
            'crossCountryMeets2010',
            'crossCountryMeets2009',
            'crossCountryMeets'
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param CrossCountryMeet $crossCountryMeet
     * @return Factory|View
     */
    public function show(CrossCountryMeet $crossCountryMeet)
    {
        return view('meets.crossCountry.show', compact('crossCountryMeet'));
    }
}
