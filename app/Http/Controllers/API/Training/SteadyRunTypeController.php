<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Training\RunTypes\Steady;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SteadyRunTypeController extends Controller
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
        return Steady::orderBy('id')->WhereNotIn('id', [1,4])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $steady = request()->validate([
            'name'          => 'required|string',
            'description'   => 'string|nullable'
        ]);

        $steady = Steady::create($steady);

        return response()->json($steady, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Steady $steady
     * @return Response
     */
    public function show(Steady $steady)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Steady $steady
     * @return void
     */
    public function update(Steady $steady)
    {
        request()->validate([
            'name'          => 'required|string',
            'description'   => 'string|nullable'
        ]);

        $steady->update(request([
            'name',
            'description'
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Steady $steady
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Steady $steady)
    {
        $steady->delete();

        return response()->json(null, 204);
    }
}
