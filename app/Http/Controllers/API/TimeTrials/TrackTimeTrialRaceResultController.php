<?php

namespace App\Http\Controllers\API\TimeTrials;

use App\Http\Controllers\Controller;
use App\Models\TimeTrials\Track\Race;
use App\Models\TimeTrials\Track\Result;
use App\Models\TimeTrials\Track\TimeTrial;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class TrackTimeTrialRaceResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Result[]|Builder[]|Collection
     */
    public function index()
    {
        return Result::with('athlete', 'events')
            ->orderBy('place')
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
            'athlete_id'    => 'required|integer',
            'place'         => 'required|integer',
            'minutes'       => 'required|integer',
            'seconds'       => 'required|integer',
            'milliseconds'  => 'integer|nullable',
            'heat'          => 'nullable|integer',
        ]);

        $result = $race->addResults(request([
            'athlete_id',
            'place',
            'milliseconds',
            'heat',
            'total_seconds' => request('minutes') * 60 + request('seconds'),
            ]));

        return $result->load('athlete');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param TimeTrial $timeTrial
     * @param Race $race
     * @param Result $result
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, TimeTrial $timeTrial, Race $race, Result $result)
    {
        $this->validate($request, [
            'athlete_id'    => 'required|integer',
            'minutes'       => 'integer|max:59',
            'seconds'       => 'integer|max:59',
            'milliseconds'  => 'integer|nullable',
            'heat'          => 'nullable|required',
        ]);

        $result->update(request([
            'athlete_id',
            'milliseconds',
            'place',
            'heat',
        ]) + ['total_seconds' => (request('minutes') * 60) + request('seconds')]);

        return response()->json($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TimeTrial $timeTrial
     * @param Race $race
     * @param Result $result
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(TimeTrial $timeTrial, Race $race, Result $result)
    {
        $result->delete();

        return response()->json(null, 204);
    }
}
