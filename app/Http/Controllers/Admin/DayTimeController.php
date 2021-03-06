<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Properties\General\DayTime;
use Illuminate\Http\Request;

class DayTimeController extends Controller
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
        $dayTimes = DayTime::all();

        if (request()->expectsJson()) {
            return $dayTimes;
        }

        return view('properties.general.dayTimes.index', compact('dayTimes'));
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
     * @param  \App\Models\Properties\General\DayTime  $dayTime
     * @return \Illuminate\Http\Response
     */
    public function show(DayTime $dayTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Properties\General\DayTime  $dayTime
     * @return \Illuminate\Http\Response
     */
    public function edit(DayTime $dayTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Properties\General\DayTime  $dayTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DayTime $dayTime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Properties\General\DayTime  $dayTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(DayTime $dayTime)
    {
        //
    }
}
