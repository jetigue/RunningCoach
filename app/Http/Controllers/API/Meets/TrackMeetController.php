<?php

namespace App\Http\Controllers\API\Meets;

use App\Filters\TrackMeetFilter;
use App\Http\Controllers\Controller;
use App\Models\Meets\TrackMeet;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class TrackMeetController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach');
    }

    /**
     * @return TrackMeet[]|Builder[]|Collection
     */
    public function index()
    {
        return TrackMeet::with('season', 'host', 'venue', 'timing', 'name')
            ->orderBy('meet_date', 'desc')
            ->get();
    }

    /**
     * @param Request $request
     * @return TrackMeetController|TrackMeet
     */
    public function store(Request $request)
    {
        return $this->storeMeet($request);
    }

    /**
     * Display the specified resource.
     *
     * @param TrackMeet $trackMeet
     * @return TrackMeet
     */
    public function show(TrackMeet $trackMeet)
    {
        return TrackMeet::with('host', 'name', 'venue', 'timing', 'season');
    }

    /**
     * Update the TimeTrial Meet in the Database.
     *
     * @param Request $request
     * @param TrackMeet $trackMeet
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, TrackMeet $trackMeet)
    {
        return $this->updateMeet($request, $trackMeet);
    }

    /**
     * @param TrackMeet $trackMeet
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(TrackMeet $trackMeet)
    {
        $trackMeet->delete();

        return response()->json(null, 204);
    }

    /**
     * Store a Track Meet in the Database.
     * @return mixed
     */
    protected function storeMeet()
    {
        $trackMeet = request()->validate([
            'meet_name_id'     => 'required|integer',
            'meet_date'        => 'required|date',
            'season_id'        => 'required|integer',
            'host_id'          => 'required|integer',
            'track_venue_id'   => 'required|integer',
            'timing_method_id' => 'required|integer',
        ]);

        $trackMeet = TrackMeet::create($trackMeet);

        return $trackMeet->load('name', 'timing', 'venue', 'host', 'season');
    }

    /**
     * @param Request $request
     * @param TrackMeet $trackMeet
     * @return JsonResponse
     * @throws ValidationException
     */
    protected function updateMeet(Request $request, TrackMeet $trackMeet): JsonResponse
    {
        $this->validate($request, [
            'meet_name_id'     => 'required|integer',
            'meet_date'        => 'required|date',
            'season_id'        => 'required|integer',
            'host_id'          => 'required|integer',
            'track_venue_id'         => 'required|integer',
            'timing_method_id' => 'required|integer',
        ]);

        $trackMeet->update(request([
            'meet_name_id',
            'meet_date',
            'season_id',
            'host_id',
            'track_venue_id',
            'timing_method_id',
        ]));

        return response()->json($trackMeet, 200);
    }
}
