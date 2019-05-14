<?php

namespace App\Http\Controllers\API\Properties\Meets;

use App\Filters\NameFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties\Meets\Name;

class NameController extends Controller
{
    /**
     * @param NameFilter $filters
     * @return mixed
     */
    public function index(NameFilter $filters)
    {
        $meetNames = Name::filter($filters)
            ->with('season')
            ->orderBy('name')
            ->get();

        return $meetNames;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meetName = request()->validate([
            'name' => 'required|string|min:3',
            'season_id' => 'required|integer',
        ]);

        $meetName = Name::create($meetName);

        return $meetName->load('season');
        // ->response()->json($name, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Meets\Name  $meetName
     * @return \Illuminate\Http\Response
     */
    public function show(Name $meetName)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Properties\Meets\Name  $meetName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Name $meetName)
    {
        request()->validate([
            'name' => 'required|string|min:3',
            'season_id' => 'required|integer',
        ]);

        $meetName->update(request(['name', 'season_id']));

        return response()->json($meetName, 200);
    }

    /**
     * @param Name $meetName
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Name $meetName)
    {
        $meetName->delete();

        return response()->json(null, 204);
    }
}
