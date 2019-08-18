<?php

namespace App\Http\Controllers\API\Meets;

use App\Models\Meets\CrossCountryMeet;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CrossCountryMeetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CrossCountryMeet[]|Builder[]|Collection
     */
    public function index()
    {
        $crossCountryMeets = CrossCountryMeet::with('host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->get();

        return $crossCountryMeets;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $crossCountryMeet = request()->validate([
            'meet_name_id'     => 'required|integer',
            'meet_date'        => 'required|date',
            'host_id'          => 'required|integer',
            'venue_id'         => 'required|integer',
            'timing_method_id' => 'required|integer',
        ]);

        $crossCountryMeet = CrossCountryMeet::create($crossCountryMeet);

        return $crossCountryMeet->load('name', 'timing', 'venue', 'host');
    }

    /**
     * Display the specified resource.
     *
     * @param CrossCountryMeet $crossCountryMeet
     * @return Response
     */
    public function show(CrossCountryMeet $crossCountryMeet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CrossCountryMeet $crossCountryMeet
     * @return Response
     */
    public function update(Request $request, CrossCountryMeet $crossCountryMeet)
    {
        request()->validate([
            'meet_name_id'     => 'required|integer',
            'meet_date'        => 'required|date',
            'host_id'          => 'required|integer',
            'venue_id'         => 'required|integer',
            'timing_method_id' => 'required|integer',
        ]);

        $crossCountryMeet->update(request([
            'meet_name_id',
            'meet_date',
            'host_id',
            'venue_id',
            'timing_method_id'
        ]));

        return response()->json($crossCountryMeet, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CrossCountryMeet $crossCountryMeet
     * @return Response
     * @throws \Exception
     */
    public function destroy(CrossCountryMeet $crossCountryMeet)
    {
        $crossCountryMeet->delete();

        return response()->json(null, 204);
    }
}
