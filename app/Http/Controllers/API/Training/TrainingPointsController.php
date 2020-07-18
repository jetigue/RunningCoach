<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Training\Intensity;
use App\Models\Training\RunningActivities\IntervalRun;
use App\Models\Training\RunningActivities\SteadyRun;
use Illuminate\Http\Request;

class TrainingPointsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Calendar $calendar
     * @param SteadyRun $steadyRun
     * @param Intensity $intensity
     * @return void
     */
    public function show(Calendar $calendar, SteadyRun $steadyRun, Intensity $intensity)
    {
        return SteadyRun::where('training_date', $calendar->calendar_date)
            ->sum($steadyRun->points)
            ->with('intensity');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
