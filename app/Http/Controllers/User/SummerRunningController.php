<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RunningLog\RunningLog;
use App\Repositories\RunningLogs;
use Illuminate\Http\Request;

class SummerRunningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param RunningLogs $runningLogs
     * @return \Illuminate\Http\Response
     */
    public function index(RunningLogs $runningLogs)
    {
        $summerRunners = $runningLogs->totalSummerMileagePerRunner();

        return view('runningLog.summerRunning.index', compact('summerRunners'));
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
     * @param  \App\Models\RunningLog\RunningLog  $runningLog
     * @return \Illuminate\Http\Response
     */
    public function show(RunningLog $runningLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RunningLog\RunningLog  $runningLog
     * @return \Illuminate\Http\Response
     */
    public function edit(RunningLog $runningLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RunningLog\RunningLog  $runningLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RunningLog $runningLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RunningLog\RunningLog  $runningLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(RunningLog $runningLog)
    {
        //
    }
}
