<?php

namespace App\Http\Controllers\API\Properties\General;

use App\Models\Properties\General\Season;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $seasons = Season::all();

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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function storeSeason(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->validate($request, [
            'name' => 'required|string|min:3',
        ]);

        $season = new Season;

        $season->name = $request->name;
        $season->slug = str_slug($request->name);

        $season->save();

        return response()->json($season, 201);
    }

    /**
     * @param Request $request
     * @param Season $season
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function updateSeason(Request $request, Season $season): \Illuminate\Http\JsonResponse
    {
        $this->validate($request, [
            'name' => 'required|string|min:3'
        ]);

        $season->name = $request->name;
        $season->slug = str_slug($request->name);

        $season->update(request(['name', 'slug']));

        return response()->json($season, 200);
    }
}
