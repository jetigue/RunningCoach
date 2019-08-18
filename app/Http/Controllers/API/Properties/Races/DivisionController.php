<?php

namespace App\Http\Controllers\API\Properties\Races;

use App\Models\Properties\Races\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except('index');
        $this->middleware('coach')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::with('gender', 'level')->get();

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
            'gender_id' => 'required|integer',
            'level_id' => 'required|integer',
            'name' => 'nullable|string',
        ]);

        $division = Division::create($division);

        return $division->load('gender', 'level');
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
            'gender_id' => 'required|integer',
            'level_id' => 'required|integer',
//            'name' => 'nullable|string',
        ]);

        $division->update(request([
            'gender_id',
            'level_id',
//            'name'
        ]));

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
