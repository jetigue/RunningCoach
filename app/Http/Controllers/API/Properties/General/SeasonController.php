<?php

namespace App\Http\Controllers\API\Properties\General;

use Illuminate\Http\Request;
use App\Filters\SeasonFilter;
use App\Http\Controllers\Controller;
use App\Models\Properties\General\Season;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SeasonFilter $filters)
    {
        $seasons = Season::filter($filters)->orderBy('name')->get();

        return $seasons;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        return $this->storeSeason($request);
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
     * @param Request $request
     * @param Season $season
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Season $season)
    {
        return $this->updateSeason($request, $season);
    }

    /**
     * @param Season $season
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Season $season)
    {
        $season->delete();

        return response()->json(null, 204);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    protected function storeSeason(): \Illuminate\Http\JsonResponse
    {
        $season = request()->validate([
            'name' => 'required|string|min:3',
        ]);

        $season = Season::create($season);

        return response()->json($season, 201);
    }

    /**
     * @param Season $season
     * @return \Illuminate\Http\JsonResponse
     */
    protected function updateSeason(Season $season): \Illuminate\Http\JsonResponse
    {
        request()->validate([
            'name' => 'required|min:3',
        ]);

        $season->update(request(['name']));

        return response()->json($season, 200);
    }
}
