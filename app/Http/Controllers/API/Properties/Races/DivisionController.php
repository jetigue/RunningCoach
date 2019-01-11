<?php

namespace App\Http\Controllers\API\Properties\Races;

use App\Models\Properties\Races\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::all();

        return $divisions;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $division = request()->validate([
            'name' => 'required|string|min:3'
        ]);

        $division = Division::create($division);

        return response()->json($division, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Races\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Properties\Races\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        request()->validate([
            'name' => 'required|min:3'
        ]);

        $division->update(request(['name']));

        return response()->json($division, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Properties\Races\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        $division->delete();

        return response()->json(null, 204);
    }
}
