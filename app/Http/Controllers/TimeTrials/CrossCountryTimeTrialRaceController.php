<?php

namespace App\Http\Controllers\TimeTrials;

use App\Http\Controllers\Controller;
use App\Models\TimeTrials\CrossCountry\Race;
use App\Models\TimeTrials\CrossCountry\Result;
use App\Models\TimeTrials\CrossCountry\TimeTrial;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CrossCountryTimeTrialRaceController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param TimeTrial $timeTrial
     * @param Race $race
     * @param Result $results
     * @return Application|Factory|View
     */
    public function show(TimeTrial $timeTrial, Race $race, Result $results)
    {
        $results = Result::where('xc_time_trial_race_id', $race->id)->orderBy('place')
            ->with('race', 'athlete')->get();

        return view('timeTrials.crossCountry.races.show', compact('race', 'results'));
    }
}
