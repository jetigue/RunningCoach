<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Training\TrainingPhase;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TrainingPhaseController extends Controller
{

    /**
     * TrainingPhaseController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin')->except('index');

        $this->middleware('auth')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return TrainingPhase[]|Collection
     */
    public function index()
    {
        return TrainingPhase::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $phase= request()->validate([
            'name'                  => 'required|string',
            'description'           => 'required|string',
            'training_period_id'    => 'required|integer'
        ]);

        $phase= TrainingPhase::create($phase);

        return response()->json($phase, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param TrainingPhase $trainingPhase
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingPhase $trainingPhase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param TrainingPhase $trainingPhase
     * @return JsonResponse
     */
    public function update(Request $request, TrainingPhase $trainingPhase)
    {
        request()->validate([
            'name'                  => 'required|string',
            'description'           => 'required|string',
            'training_period_id'    => 'required|integer'
        ]);

        $trainingPhase->update(request([
            'name',
            'description',
            'training_period_id'
        ]));

        return response()->json($trainingPhase, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TrainingPhase $trainingPhase
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(TrainingPhase $trainingPhase)
    {
        $trainingPhase->delete();

        return response()->json(null, 204);
    }
}
