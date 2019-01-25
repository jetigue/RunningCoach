<?php

namespace App\Http\Controllers\Properties\General;

use App\Models\Properties\General\Season;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Filters\SeasonFilter;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \App\Filters\SeasonFilter $filters
     * @return \Illuminate\Http\Response
     */
    public function index(SeasonFilter $filters)
    {
        // $seasons = Season::all();

        $seasons = Season::filter($filters)->orderBy('name')->get();

        if (request()->expectsJson())
        {
            return $seasons;
        }

        return view('properties.general.seasons.index', compact('seasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\General\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(Season $season)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Properties\General\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit(Season $season)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Properties\General\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Season $season)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Properties\General\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Season $season)
    {
        //
    }
}
