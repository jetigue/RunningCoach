<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Training\Intensity;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TrainingIntensityController extends Controller
{

    /**
     * TrainingIntensityController constructor.
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
        return Intensity::orderBy('percentVO2Max')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $intensity = request()->validate([
            'name'          => 'required|string',
            'percentVO2Max' => 'required|string',
            'percentHRMax'  => 'required|string',
            'description'   => 'required|string',
            'purpose'       => 'required|string',
            'sources'        =>'required|string'
        ]);

        $intensity = Intensity::create($intensity);

        return response()->json($intensity, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Intensity $intensity
     * @return JsonResponse
     */
    public function update(Request $request, Intensity $intensity)
    {
        request()->validate([
            'name'          => 'required|string',
            'percentVO2Max' => 'required|string',
            'percentHRMax'  => 'required|string',
            'description'   => 'required|string',
            'purpose'       => 'required|string',
            'sources'        =>'required|string'
        ]);

        $intensity->update(request([
            'name',
            'percentVO2Max',
            'percentHRMax',
            'description',
            'purpose',
            'sources'
        ]));

        return response()->json($intensity, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Intensity $intensity
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Intensity $intensity)
    {
        $intensity->delete();

        return response()->json(null, 204);
    }
}
