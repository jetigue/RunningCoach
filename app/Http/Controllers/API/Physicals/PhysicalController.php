<?php

namespace App\Http\Controllers\API\Physicals;

use App\Http\Controllers\Controller;
use App\Models\Physical;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PhysicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $physical = request()->validate([
            'athlete_id' => 'integer|required',
            'consent_form' => 'boolean',
            'concussion_form' => 'boolean',
            'evaluation_form' =>'boolean',
            'exam_date' => 'date|required',
            'restrictions' => 'string|nullable',
            'notes' => 'string|nullable',
        ]);

        $physical = Physical::create($physical)->load('athlete');

        return response()->json($physical, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Physical $physical
     * @return Response
     */
    public function show(Physical $physical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Physical $physical
     * @return JsonResponse
     */
    public function update(Request $request, Physical $physical)
    {
        request()->validate([
            'athlete_id'        => 'integer',
            'consent_form'      => 'boolean',
            'concussion_form'   => 'boolean',
            'evaluation_form'   => 'boolean',
            'exam_date'         => 'date',
            'restrictions'      => 'string|nullable',
            'notes'             => 'string|nullable',
        ]);

        $physical->update(request([
            'athlete_id',
            'consent_form',
            'concussion_form',
            'evaluation_form',
            'exam_date',
            'restrictions',
            'notes',
        ]));

        return response()->json($physical, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Physical $physical
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Physical $physical)
    {
        $physical->delete();

        return response()->json(null, 204);
    }
}
