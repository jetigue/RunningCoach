<?php

namespace App\Http\Controllers\Admin\Training;

use App\Http\Controllers\Controller;
use App\Models\Training\RunTypes\Interval;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IntervalRunTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $intervalRuns = Interval::orderBy('name')->get();

        return view('training.runTypes.interval.index', compact('intervalRuns'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training\RunTypes\Interval  $interval
     * @return \Illuminate\Http\Response
     */
    public function show(Interval $interval)
    {
        //
    }
}
