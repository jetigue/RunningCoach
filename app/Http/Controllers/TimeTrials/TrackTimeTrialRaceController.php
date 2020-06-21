<?php

namespace App\Http\Controllers\TimeTrials;

use App\Http\Controllers\Controller;
use App\Models\TimeTrials\Track\Race;
use App\Models\TimeTrials\Track\Result;
use App\Models\TimeTrials\Track\TimeTrial;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrackTimeTrialRaceController extends Controller
{
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

        return view('timeTrials.track.races.show', compact('race', 'results'));
    }
}
