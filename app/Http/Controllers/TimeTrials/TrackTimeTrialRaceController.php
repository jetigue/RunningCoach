<?php

namespace App\Http\Controllers\TimeTrials;

use App\Models\TimeTrials\Track\Race;
use App\Models\TimeTrials\Track\Result;
use App\Models\TimeTrials\Track\TimeTrial;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class TrackTimeTrialRaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param TimeTrial $timeTrial
     * @param Race $race
     * @param Result $results
     * @return Factory|View
     */
    public function show(TimeTrial $timeTrial, Race $race, Result $results)
    {
        $results = Result::where('track_time_trial_race_id', $race->id)->orderBy('place')
            ->with('race', 'athlete')->get();

        return view('timeTrials.track.races.show', compact('race','results'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Race $race
     * @return \Illuminate\Http\Response
     */
    public function edit(Race $race)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Race $race
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Race $race)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Race $race
     * @return \Illuminate\Http\Response
     */
    public function destroy(Race $race)
    {
        //
    }
}
