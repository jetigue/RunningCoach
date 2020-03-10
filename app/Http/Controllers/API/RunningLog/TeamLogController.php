<?php

namespace App\Http\Controllers\API\RunningLog;

use App\Http\Controllers\Controller;
use App\Models\RunningLog\RunningLog;
use Illuminate\Http\Request;

class TeamLogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamLog = RunningLog::orderBy('run_date', 'desc')
            ->with('user', 'runType', 'runEffort', 'runFeeling', 'terrainType', 'dayTime')
            ->paginate(25);

        return $teamLog;
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
