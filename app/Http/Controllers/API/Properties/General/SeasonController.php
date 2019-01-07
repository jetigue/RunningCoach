<?php

namespace App\Http\Controllers\API\Properties\General;

use App\Models\Properties\General\Season;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::all();

        return $seasons;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $season = request()->validate([
            'name' => 'required|string|min:3'
        ]);

        $season = Season::create($season);

        return response()->json($season, 201);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Properties\General\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Season $season)
    {
        request()->validate([
            'name' => 'required|min:3'
        ]);

        $season->update(request(['name']));

        return response()->json($season, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Properties\General\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Season $season)
    {
        $season->delete();

        return response()->json(null, 204);
    }
}
