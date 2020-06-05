<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Training\RunTypes\Interval;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IntervalRunTypeController extends Controller
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
     * @return Response
     */
    public function index()
    {
        return Interval::orderBy('name')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $interval = request()->validate([
            'name'          => 'required|string',
            'description'   => 'string|nullable'
        ]);

        $interval= Interval::create($interval);

        return response()->json($interval, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Interval $interval
     * @return Response
     */
    public function show(Interval $interval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Interval $interval
     * @return JsonResponse
     */
    public function update(Request $request, Interval $interval)
    {
        request()->validate([
            'name'          => 'required|string',
            'description'   => 'string|nullable'
        ]);

        $interval->update(request([
            'name',
            'description'
        ]));

        return response()->json($interval, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Interval $interval
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Interval $interval)
    {
        $interval->delete();

        return response()->json(null, 204);
    }
}
