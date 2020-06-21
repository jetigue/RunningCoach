<?php

namespace App\Http\Controllers\TimeTrials;

use App\Http\Controllers\Controller;
use App\Models\TimeTrials\CrossCountry\TimeTrial;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CrossCountryTimeTrialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $timeTrials = TimeTrial::with('venue', 'timing')
            ->orderBy('trial_date', 'desc')
            ->get();

        return view('timeTrials.crossCountry.index', compact('timeTrials'));
    }

    /**
     * Display the specified resource.
     *
     * @param TimeTrial $timeTrial
     * @return Application|Factory|View
     */
    public function show(TimeTrial $timeTrial)
    {
        return view('timeTrials.crossCountry.show', compact('timeTrial'));
    }

}
