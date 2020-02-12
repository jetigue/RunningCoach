<?php

namespace App\Http\Controllers\API\Properties\Meets;

use App\Models\Properties\Meets\CrossCountry\Venue;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Filters\VenueFilter;
use Illuminate\Http\Response;

class CrossCountryVenueController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @param VenueFilter $filters
     * @return Response
     */
    public function index(VenueFilter $filters)
    {
        return Venue::filter($filters)
            ->with('season')
            ->orderBy('name')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
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
     * @param Venue $venue
     * @return Response
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Venue $venue
     * @return Response
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
     * @param Venue $venue
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();

        return response()->json(null, 204);
    }
}
