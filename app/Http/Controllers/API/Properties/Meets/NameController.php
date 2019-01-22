<?php

namespace App\Http\Controllers\API\Properties\Meets;

use App\Models\Properties\Meets\Name;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties\General\Season;

class NameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($seasonSlug = request('season')) {
            $season = Season::where('slug', $seasonSlug)->firstOrFail();

            $names = Name::where('season_id', $season->id)->with('season')->orderBy('name');

            $names = $names->get();
        }

        $names = Name::all();

        return $names;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = request()->validate([
            'name' => 'required|string|min:3',
            'season_id' => 'required|integer'
        ]);

        $name = Name::create($name);

        return $name->load('season');
        // ->response()->json($name, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Meets\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function show(Name $name)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Properties\Meets\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Name $name)
    {
        request()->validate([
            'name' => 'required|string|min:3',
            'season_id' => 'required|integer'
        ]);

        $name->update(request(['name', 'season_id']));

        return response()->json($name, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Properties\Meets\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy(Name $name)
    {
        $name->delete();

        return response()->json(null, 204);
    }
}
