<?php

namespace App\Http\Controllers\API\Physicals;

use App\Models\Physical;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhysicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $physical = request()->validate ([
            'athlete_id' => 'integer|required',
            'consent_form' => 'boolean',
            'concussion_form' => 'boolean',
            'evaluation_form' =>'boolean',
            'exam_date' => 'date|required',
            'restrictions' => 'string|nullable',
            'notes' => 'string|nullable'
        ]);

        $physical = Physical::create($physical)->load('athlete');

        return response()->json($physical, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Physical  $physical
     * @return \Illuminate\Http\Response
     */
    public function show(Physical $physical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Physical  $physical
     * @return \Illuminate\Http\Response
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
     * @param  \App\Models\Physical  $physical
     * @return \Illuminate\Http\Response
     */
    public function destroy(Physical $physical)
    {
        $physical->delete();

        return response()->json(null, 204);
    }
}
