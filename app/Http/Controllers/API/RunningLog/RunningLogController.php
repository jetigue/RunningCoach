<?php

namespace App\Http\Controllers\API\RunningLog;

use App\Models\Runninglog\RunningLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RunningLogController extends Controller
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
        $runningLogs = RunningLog::all();

        return $runningLogs;
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
        $runningLog = request()->validate([
            'run_date'          => 'date|required',
            'day_time_id'       => 'integer|required',
            'distance'          => 'numeric|required',
            'milliseconds'      => 'integer|nullable',
            'terrain_type_id'   => 'integer|required',
            'run_type_id'       => 'integer|required',
            'run_effort_id'     => 'integer|required',
            'run_feeling_id'    => 'integer|required',
            'notes'             => 'nullable'
        ]);

        $runningLog = RunningLog::create($runningLog + [
            'user_id' => auth()->id(),
            'total_seconds' => request('hours') * 3600 + request('minutes') * 60 + request('seconds')
            ])
            ->load('dayTime', 'runEffort', 'runFeeling','runType', 'terrainType');

        return response()->json($runningLog, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Runninglog\RunningLog  $runningLog
     * @return \Illuminate\Http\Response
     */
    public function show(RunningLog $runningLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Runninglog\RunningLog  $runningLog
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
     * @param  \App\Models\Runninglog\RunningLog  $runningLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RunningLog $runningLog)
    {
        $this->validate($request, [
            'run_date'          => 'date|required',
            'day_time_id'       => 'integer|required',
            'distance'          => 'numeric|required',
            'hours'             => 'integer',
            'minutes'           => 'integer|max:59',
            'seconds'           => 'integer|max:59',
            'milliseconds'      => 'integer|nullable',
            'terrain_type_id'   => 'integer|required',
            'run_type_id'       => 'integer|required',
            'run_effort_id'     => 'integer|required',
            'run_feeling_id'    => 'integer|required',
            'notes'             => 'nullable',
        ]);

        $runningLog->update(request([
            'run_date',
            'distance',
            'milliseconds',
            'day_time_id',
            'terrain_type_id',
            'run_type_id',
            'run_effort_id',
            'run_feeling_id',
            'notes'
        ]) + ['total_seconds' =>
                    request('hours') * 3600 + request('minutes') * 60 + request('seconds')
            ]);

        return response()->json($runningLog, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Runninglog\RunningLog  $runningLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(RunningLog $runningLog)
    {
        //
    }
}
