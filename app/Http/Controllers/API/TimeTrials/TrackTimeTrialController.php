<?php

namespace App\Http\Controllers\API\TimeTrials;

use App\Models\TimeTrials\Track\TimeTrial;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TrackTimeTrialController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach');
    }

    /**
     * Display a listing of the resource.
     *
     * @return TimeTrial[]|Builder[]|Collection
     */
    public function index()
    {
        return TimeTrial::with('venue', 'timing')
            ->orderBy('trial_date', 'desc')
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
        $timeTrial = request()->validate([
            'name'  => 'required|string',
            'trial_date' => 'required|date',
            'track_venue_id' => 'required|integer',
            'timing_method_id' => 'required|integer'
        ]);

        $timeTrial = TimeTrial::create($timeTrial);

        return $timeTrial->load('venue', 'timing');
    }

    /**
     * Display the specified resource.
     *
     * @param TimeTrial $timeTrial
     * @return void
     */
    public function show(TimeTrial $timeTrial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param TimeTrial $timeTrial
     * @return JsonResponse
     */
    public function update(Request $request, TimeTrial $timeTrial)
    {
        request()->validate([
            'name'  => 'required|string',
            'trial_date' => 'required|date',
            'track_venue_id' => 'required|integer',
            'timing_method_id' => 'required|integer',
        ]);

        $timeTrial->update(request([
            'name',
            'trial_date',
            'track_venue_id',
            'timing_method_id',
        ]));

        return response()->json($timeTrial, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TimeTrial $timeTrial
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(TimeTrial $timeTrial)
    {
        $timeTrial->delete();

        return response()->json(null, 204);
    }
}
