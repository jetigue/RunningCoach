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

        if (request()->expectsJson()) {
            return $timeTrials;
        }

        return view('timeTrials.track.index', compact('timeTrials'));
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
     * @return Factory|View
     */
    public function show(TimeTrial $timeTrial)
    {
        return view('timeTrials.track.show', compact('timeTrial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TimeTrial $timeTrial
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeTrial $timeTrial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param TimeTrial $timeTrial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeTrial $timeTrial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TimeTrial $timeTrial
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeTrial $timeTrial)
    {
        //
    }
}
