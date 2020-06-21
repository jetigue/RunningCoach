<?php

namespace App\Http\Controllers\TimeTrials;

use App\Http\Controllers\Controller;
use App\Models\TimeTrials\Track\TimeTrial;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrackTimeTrialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $timeTrials = TimeTrial::with('venue', 'timing')
            ->orderBy('trial_date', 'desc')
            ->get();

        return view('timeTrials.track.index', compact('timeTrials'));
    }

    /**
     * Display the specified resource.
     *
     * @param TimeTrial $timeTrial
     * @return Factory|View
     */
    public function show(TimeTrial $timeTrial)
    {
        return view('timeTrials.track.show', compact('timeTrial'));
    }
}
