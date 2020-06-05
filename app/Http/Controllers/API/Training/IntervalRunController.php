<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Training\RunningActivities\IntervalRun;
use App\Models\Training\RunningActivities\SteadyRun;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IntervalRunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return SteadyRun[]|Collection
     */
    public function index()
    {
        return IntervalRun::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Calendar $calendar
     * @param IntervalRun $intervalRun
     * @return Model
     */
    public function store(Calendar $calendar, IntervalRun $intervalRun)
    {
        request()->validate([
            'beginner' => 'string',
            'duration' => 'required|integer',
            'duration_unit' => 'required|string',
            'interval_run_type_id' => 'required|integer',
            'junior_varsity' => 'string',
            'notes' => 'nullable|string',
            'number_repetitions' => 'required|integer',
            'number_sets' => 'required|integer',
            'open' => 'string',
            'recovery' => 'required|integer',
            'recovery_type' => 'required|string',
            'recovery_unit' => 'required|string',
            'training_intensity_id' => 'required|integer',
            'varsity' => 'string',
            'workout' => 'required|string'
        ]);

        $intervalRun = $calendar->addIntervalRun(request([
            'beginner',
            'duration',
            'duration_unit',
            'interval_run_type_id',
            'junior_varsity',
            'notes',
            'number_repetitions',
            'number_sets',
            'open',
            'recovery',
            'recovery_type',
            'recovery_unit',
            'training_intensity_id',
            'varsity',
            'workout',
        ]));

        return $intervalRun->load('runType', 'intensity');
    }

    /**
     * Display the specified resource.
     *
     * @param SteadyRun $steadyRun
     * @return \Illuminate\Http\Response
     */
    public function show(SteadyRun $steadyRun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Calendar $calendar
     * @param IntervalRun $intervalRun
     * @return JsonResponse
     */
    public function update(Request $request, Calendar $calendar, IntervalRun $intervalRun)
    {
        request()->validate([
            'beginner' => 'string',
            'duration' => 'integer',
            'duration_unit' => 'string',
            'interval_run_type_id' => 'integer',
            'junior_varsity' => 'string',
            'notes' => 'nullable|string',
            'number_repetitions' => 'integer',
            'number_sets' => 'integer',
            'open' => 'string',
            'recover_unit' => 'string',
            'recovery' => 'integer',
            'recovery_type' => 'string',
            'training_intensity_id' => 'integer',
            'varsity' => 'string',
            'workout' => 'string',
        ]);

        $intervalRun->update(request([
            'beginner',
            'duration',
            'duration_unit',
            'interval_run_type_id',
            'junior_varsity',
            'notes',
            'number_repetitions',
            'number_sets',
            'open',
            'recovery',
            'recovery_type',
            'recovery_unit',
            'training_intensity_id',
            'varsity',
            'workout'
        ]));

        return response()->json($intervalRun, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Calendar $calendar
     * @param IntervalRun $intervalRun
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Calendar $calendar, IntervalRun $intervalRun)
    {
        $intervalRun->delete();

        return response()->json(null, 204);
    }
}
