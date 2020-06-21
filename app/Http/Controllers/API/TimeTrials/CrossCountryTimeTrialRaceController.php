<?php

namespace App\Http\Controllers\API\TimeTrials;

use App\Http\Controllers\Controller;
use App\Models\TimeTrials\CrossCountry\Race;
use App\Models\TimeTrials\CrossCountry\Result;
use App\Models\TimeTrials\CrossCountry\TimeTrial;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CrossCountryTimeTrialRaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Builder[]|Collection
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
            'cross_country_event_id'        => 'required|integer',
            'notes'                 => 'nullable|string',
        ]);

        $race = $timeTrial->addRace(request([
            'gender_id',
            'cross_country_event_id',
            'notes',
        ]));

        return $race->load('gender', 'event');
    }

    /**
     * Display the specified resource.
     *
     * @param TimeTrial $timeTrial
     * @param Race $race
     * @return Application|Factory|View
     */
    public function show(TimeTrial $timeTrial, Race $race)
    {
        $results = Result::where('xc_time_trial_race_id', $race->id)->orderBy('place')
            ->with('race', 'athlete')->get();

        return view('timeTrial.crossCountry.races.show', compact('race', 'results'));
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
            'cross_country_event_id'        => 'required|integer',
            'notes'                 => 'nullable|string',
        ]);

        $race->update(request([
            'gender_id',
            'cross_country_event_id',
            'notes',
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
