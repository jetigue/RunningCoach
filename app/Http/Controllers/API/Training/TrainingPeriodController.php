<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Training\TrainingPeriod;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TrainingPeriodController extends Controller
{
    /**
     * TrainingPeriodController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin')->except('index');

        $this->middleware('auth')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return TrainingPeriod[]|Collection
     */
    public function index()
    {
        return TrainingPeriod::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $period= request()->validate([
            'name'          => 'required|string',
            'description'   => 'required|string'
        ]);

        $period= TrainingPeriod::create($period);

        return response()->json($period, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param TrainingPeriod $trainingPeriod
     * @return Response
     */
    public function show(TrainingPeriod $trainingPeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param TrainingPeriod $trainingPeriod
     * @return JsonResponse
     */
    public function update(Request $request, TrainingPeriod $trainingPeriod)
    {
        request()->validate([
            'name'          => 'required|string',
            'description'   => 'required|string'
        ]);

        $trainingPeriod->update(request([
            'name',
            'description'
        ]));

        return response()->json($trainingPeriod, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TrainingPeriod $trainingPeriod
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(TrainingPeriod $trainingPeriod)
    {
        $trainingPeriod->delete();

        return response()->json(null, 204);
    }
}
