<?php

namespace App\Http\Controllers\User;

use App\Models\RunningLog\RunningLog;
use App\Repositories\RunningLogs;
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
    public function index(RunningLogs $runningLogs)
    {
        $weeklySummerMileage = $runningLogs->weeklySummerMileage();
        $mileageLastWeek = $runningLogs->mileageLastWeek();
        $totalMileage = $runningLogs->totalMileage();
        $totalSummerMileage = $runningLogs->totalSummerMileage();
        $totalMileageThisWeek = $runningLogs->totalMileageThisWeek();
        $totalMileageThisMonth = $runningLogs->totalMileageThisMonth();
        $totalMileageThisYear = $runningLogs->totalMileageThisYear();

        $runningLogs = RunningLog::with('dayTime', 'terrainType', 'runType', 'runEffort', 'runFeeling')
                ->where('user_id', auth()->id())
                ->orderBy('run_date', 'desc')
                ->get();

        return view('runningLog.index', compact(
            'runningLogs',
            'weeklySummerMileage',
            'mileageLastWeek',
            'totalMileage',
            'totalSummerMileage',
            'totalMileageThisWeek',
            'totalMileageThisMonth',
            'totalMileageThisYear',
            ));
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
//        $runningLog = request()->validate([
//            'run_date'          => 'required|date',
//            'day_time_id'       => 'required|integer',
//            'distance'          => 'required|numeric',
//            'hours'             => 'integer|nullable',
//            'minutes'           => 'required|integer|max:59',
//            'seconds'           => 'required|integer|max:59',
//            'milliseconds'      => 'integer|nullable',
//            'total_seconds'     => 'integer|nullable',
//            'terrain_type_id'   => 'required|integer',
//            'run_type_id'       => 'required|integer',
//            'run_effort_id'     => 'required|integer',
//            'run_feeling_id'    => 'required|integer',
//            'notes'             => 'nullable'
//        ]);
//
//        $runningLog = RunningLog::create($runningLog + ['user_id' => auth()->id()]);
//
//        return response()->json($runningLog, 201);
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
        $this->validate($request, [
            'run_date'          => 'required|date',
            'day_time_id'       => 'required|integer',
            'distance'          => 'required|numeric',
            'hours'             =>  'integer|nullable',
            'minutes'           =>  'required|integer|max:59',
            'seconds'           =>  'required|integer|max:59',
            'milliseconds'      =>  'integer|nullable',
            'total_seconds'     =>  'integer|nullable',
            'terrain_type_id'   => 'required|integer',
            'run_type_id'       =>  'required|integer',
            'run_effort_id'     => 'required|integer',
            'run_feeling_id'    => 'required|integer',
            'notes'             => 'nullable'
        ]);

        $runningLog->update(request([
            'run_date',
            'day_time_id',
            'distance',
            'hours',
            'minutes',
            'seconds',
            'milliseconds',
            'total_seconds',
            'terrain_type_id',
            'run_type_id' ,
            'run_effort_id',
            'run_feeling_id',
            'notes'
        ]));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RunningLog\RunningLog  $runningLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(RunningLog $runningLog)
    {
        $runningLog->delete();

        return response()->json(null, 204);
    }
}
