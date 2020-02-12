<?php

namespace App\Http\Controllers\API\TimeTrials;

use App\Models\TimeTrials\Track\Race;
use App\Models\TimeTrials\Track\Result;
use App\Models\TimeTrials\Track\TimeTrial;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class TrackTimeTrialRaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Race[]|Builder[]|Collection
     */
    public function index()
    {
        return Race::with('timeTrial', 'gender')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TimeTrial $timeTrial
     * @param Race $race
     * @return Model
     */
    public function store(TimeTrial $timeTrial, Race $race)
    {
        request()->validate([
            'gender_id'             => 'required|integer',
            'track_event_id'        => 'required|integer',
            'notes'                 => 'nullable|string'
        ]);

        $race = $timeTrial->addRace(request([
            'gender_id',
            'track_event_id',
            'notes'
        ]));

        return $race->load('gender', 'event');
    }

    /**
     * Display the specified resource.
     *
     * @param TimeTrial $timeTrial
     * @param Race $race
     * @return Factory|View
     */
    public function show(TimeTrial $timeTrial, Race $race)
    {
        $results = Result::where('track_time_trial_race_id', $race->id)->orderBy('place')
            ->with('race', 'athlete')->get();

        return view('timeTrial.track.races.show', compact('race', 'results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param TimeTrial $timeTrial
     * @param Race $race
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, TimeTrial $timeTrial, Race $race)
    {
        $this->validate($request, [
            'gender_id'             => 'required|integer',
            'track_event_id'        => 'required|integer',
            'notes'                 => 'nullable|string'
        ]);

        $race->update(request([
            'gender_id',
            'track_event_id',
            'notes'
        ]));

        return response()->json($race, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TimeTrial $timeTrial
     * @param Race $race
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(TimeTrial $timeTrial, Race $race)
    {
        $race->delete();

        return response()->json(null, 204);
    }
}
