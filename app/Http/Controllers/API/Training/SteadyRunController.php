<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Training\RunningActivities\SteadyRun;
use App\Models\Training\RunTypes\Steady;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SteadyRunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return SteadyRun[]|Collection
     */
    public function index()
    {
        return SteadyRun::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Calendar $calendar
     * @param SteadyRun $steadyRun
     * @return Model
     */
    public function store(Calendar $calendar, SteadyRun $steadyRun)
    {
        request()->validate([
            'duration' => 'required|integer',
            'steady_run_type_id' => 'required|integer',
            'duration_unit' => 'required|string',
            'training_intensity_id' => 'required|integer',
            'workout' => 'required|string',
            'varsity' => 'string',
            'junior_varsity' => 'string',
            'open' => 'string',
            'beginner' => 'string',
            'notes' => 'nullable|string',
        ]);

        $steadyRun = $calendar->addSteadyRun(request([
            'duration',
            'steady_run_type_id',
            'duration_unit',
            'training_intensity_id',
            'workout',
            'varsity',
            'junior_varsity',
            'open',
            'beginner',
            'notes',
        ]));

        return $steadyRun->load('runType', 'intensity');
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
     * @param SteadyRun $steadyRun
     * @return JsonResponse
     */
    public function update(Request $request, Calendar $calendar, SteadyRun $steadyRun)
    {
        request()->validate([
            'duration' => 'integer',
            'steady_run_type_id' => 'integer',
            'duration_unit' => 'string',
            'training_intensity_id' => 'integer',
            'workout' => 'string',
            'varsity' => 'string',
            'junior_varsity' => 'string',
            'open' => 'string',
            'beginner' => 'string',
            'notes' => 'nullable|string',
        ]);

        $steadyRun->update(request([
            'duration',
            'steady_run_type_id',
            'duration_unit',
            'training_intensity_id',
            'workout',
            'varsity',
            'junior_varsity',
            'open',
            'beginner',
            'notes',
        ]));

        return response()->json($steadyRun, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Calendar $calendar
     * @param SteadyRun $steadyRun
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Calendar $calendar, SteadyRun $steadyRun)
    {
        $steadyRun->delete();

        return response()->json(null, 204);
    }
}
