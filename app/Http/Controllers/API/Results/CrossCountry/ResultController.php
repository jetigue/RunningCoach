<?php

namespace App\Http\Controllers\API\Results\CrossCountry;

use App\Models\Meets\CrossCountryMeet;
use App\Models\Results\CrossCountry\Result;
use App\Models\Results\CrossCountry\TeamResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CrossCountryMeet $crossCountryMeet
     * @param TeamResult $teamResult
     * @return Model
     */
    public function store(CrossCountryMeet $crossCountryMeet, TeamResult $teamResult)
    {
        request()->validate([
            'athlete_id'    => 'required|integer',
            'place'         => 'required|integer',
            'minutes'       => 'required|integer',
            'seconds'       => 'required|integer',
            'milliseconds'  => 'integer|nullable',
            'points'        => 'nullable|integer',
        ]);

        $result = $teamResult->addResults(request([
            'athlete_id',
            'place',
            'milliseconds',
            'points',
            'total_seconds' => request('minutes') * 60 + request('seconds')
            ]));

        return $result->load('athlete');
    }

    /**
     * Display the specified resource.
     *
     * @param Result $result
     * @return Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CrossCountryMeet $crossCountryMeet
     * @param TeamResult $teamResult
     * @param Result $result
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, CrossCountryMeet $crossCountryMeet, TeamResult $teamResult, Result $result)
    {
        $this->validate($request, [
            'athlete_id'    => 'required|integer',
            'minutes'       => 'integer|max:59',
            'seconds'       => 'integer|max:59',
            'milliseconds'  => 'integer|nullable',
            'place'         => 'required|integer',
            'points'        => 'nullable|integer',
        ]);

        $result->update(request([
            'athlete_id',
            'milliseconds',
            'place',
            'points'
        ]) + ['total_seconds' => (request('minutes') * 60) + request('seconds'),]);

        return response()->json($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CrossCountryMeet $crossCountryMeet
     * @param TeamResult $teamResult
     * @param Result $result
     * @return Response
     * @throws \Exception
     */
    public function destroy(CrossCountryMeet $crossCountryMeet, TeamResult $teamResult, Result $result)
    {
        $result->delete();

        return response()->json(null, 204);
    }
}
