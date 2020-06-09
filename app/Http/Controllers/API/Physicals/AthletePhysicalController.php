<?php

namespace App\Http\Controllers\API\Physicals;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Repositories\Athletes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @return Response
     */
    public function index()
    {
        return Athlete::whereBetween('grad_year', [2021, 2025])->orderBy('last_name')->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, Athlete $athlete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return Response
     */
    public function destroy(Athlete $athlete)
    {
        //
    }
}
