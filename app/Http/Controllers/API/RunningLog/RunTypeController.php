<?php

namespace App\Http\Controllers\API\RunningLog;

use App\Models\Runninglog\RunType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RunTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $runTypes = RunType::all();

        return $runTypes;
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
        $runType = request()->validate([
            'name'        => 'required|string',
            'description' => 'required|string',
        ]);

        $runType = RunType::create($runType);

        return response()->json($runType, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Runninglog\RunType  $runType
     * @return \Illuminate\Http\Response
     */
    public function show(RunType $runType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Runninglog\RunType  $runType
     * @return \Illuminate\Http\Response
     */
    public function edit(RunType $runType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Runninglog\RunType  $runType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RunType $runType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Runninglog\RunType  $runType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RunType $runType)
    {
        //
    }
}
