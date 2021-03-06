<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RunningLog\RunFeeling;
use Illuminate\Http\Request;

class RunFeelingController extends Controller
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
        $runFeelings = RunFeeling::all();

        if (request()->expectsJson()) {
            return $runFeelings;
        }

        return view('properties.runningLog.runFeelings.index', compact('runFeelings'));
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
     * @param  \App\Models\RunningLog\RunType  $runType
     * @return \Illuminate\Http\Response
     */
    public function show(RunType $runType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RunningLog\RunType  $runType
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
     * @param  \App\Models\RunningLog\RunType  $runType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RunType $runType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RunningLog\RunType  $runType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RunType $runType)
    {
        //
    }
}
