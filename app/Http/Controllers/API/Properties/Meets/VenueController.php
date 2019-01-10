<?php

namespace App\Http\Controllers\API\Properties\Meets;

use App\Models\Properties\Meets\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::all();

        return $venues;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venue = request()->validate([
            'name' => 'required|string|min:3',
            'season_id' => 'required|integer'
        ]);

        $venue = Venue::create($venue);

        return $venue->load('season');
        // ->response()->json($venue, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Meets\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Properties\Meets\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        request()->validate([
            'name' => 'required|min:3',
            'season_id' => 'required|integer'
        ]);

        $venue->update(request(['name', 'season_id']));

        return response()->json($venue, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Properties\Meets\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();

        return response()->json(null, 204);
    }
}
