<?php

namespace App\Http\Controllers\API\Results\CrossCountry;

use App\Models\Meets\CrossCountryMeet;
use App\Models\Results\CrossCountry\Result;
use App\Models\Results\CrossCountry\TeamResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
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
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(CrossCountryMeet $crossCountryMeet, TeamResult $teamResult)
    {
        request()->validate([
            'athlete_id'    => 'required|integer',
            'place'         => 'required|integer',
            'minutes'       => 'required|integer',
            'seconds'       => 'required|integer',
            'milliseconds'  => 'integer',
            'points'        => 'nullable|integer',
        ]);

        $result = $teamResult->create(request([
            'athlete_id',
            'place',
//            'minutes',
//            'seconds',
            'milliseconds',
            'points'
        ]));

        return $result->load('athlete');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Results\CrossCountry\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Results\CrossCountry\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Results\CrossCountry\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
