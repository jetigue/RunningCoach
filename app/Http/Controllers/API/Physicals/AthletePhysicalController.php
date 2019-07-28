<?php

namespace App\Http\Controllers\API\Physicals;

use App\Repositories\Athletes;
use App\Models\Athlete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AthletePhysicalController extends Controller
{

    /**
     * AthleteController constructor.
     */
    public function __construct()
    {
        $this->middleware('coach');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Athletes $athletes
     * @return \Illuminate\Http\Response
     */
    public function index(Athletes $athletes)
    {
        $requires = $athletes->requiresPhysical();

         return $requires;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Athlete $athlete)
    {
        //
    }
}
