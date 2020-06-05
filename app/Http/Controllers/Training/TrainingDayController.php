<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Training\TrainingDay;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrainingDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $thisMonth = date('n');
        $thisYear = date('Y');

        $currentMonth = Calendar::whereMonth('calendar_date', $thisMonth)
            ->whereYear('calendar_date', $thisYear)
            ->get();



        return view('training.calendar.index', compact('currentMonth'));
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
     * @param  \App\Models\Training\TrainingDay  $trainingDay
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingDay $trainingDay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training\TrainingDay  $trainingDay
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingDay $trainingDay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training\TrainingDay  $trainingDay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingDay $trainingDay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training\TrainingDay  $trainingDay
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingDay $trainingDay)
    {
        //
    }
}
