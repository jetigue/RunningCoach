<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Training\Workout;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TrainingCalendarWorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Workout[]|Collection
     */
    public function index()
    {
        return Workout::orderBy('training_group_id')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Calendar $calendar
     * @param Workout $workout
     * @return Model
     */
    public function store(Calendar $calendar, Workout $workout)
    {
        request()->validate([
            'name' => 'required|string',
            'training_group_id' => 'required|integer'
        ]);

        $workout = $calendar->addWorkout(request([
            'name',
            'training_group_id'
        ]));

        return $workout->load('trainingGroup');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Calendar $calendar
     * @param Workout $workout
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Calendar $calendar, Workout $workout,Request $request)
    {
        request()->validate([
            'name'          => 'required|string',
            'training_group_id' => 'required|integer'
        ]);

        $workout->update(request([
            'name',
            'training_group_id'
        ]));

        return response()->json($workout, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Calendar $calendar
     * @param Workout $workout
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Calendar $calendar, Workout $workout)
    {
        $workout->delete();

        return response()->json(null, 204);
    }
}
