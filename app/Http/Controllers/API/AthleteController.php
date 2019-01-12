<?php

namespace App\Http\Controllers\API;

use App\Models\Athlete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AthleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $athletes = Athlete::all();

        return $athletes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $athlete = request()->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'sex'        => 'required',
            'dob'        => 'nullable|date',
            'grad_year'  => 'required|integer',
            'status'     => 'required',
            'team_id'    => 'nullable|integer',
            'user_id'    => 'nullable|integer',
        ]);

        $athlete = Athlete::create($athlete);

        return response()->json($athlete, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function show(Athlete $athlete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Athlete $athlete)
    {
        request()->validate([
            'first_name'    => 'string',
            'last_name'     => 'string',
            'sex'           => '',
            'dob'           => 'nullable|date',
            'grad_year'     => 'integer',
            'status'        => '',
            'team_id'       => 'nullable|integer',
            'user_id'       => 'nullable|integer',
        ]);

        $athlete->update(request([
            'first_name',
            'last_name',
            'sex',
            'dob',
            'grad_year',
            'status',
            'team_id',
            'user_id',
        ]));

        return response()->json($athlete, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Athlete $athlete)
    {
        $athlete->delete();

        return response()->json(null, 204);
    }
}
