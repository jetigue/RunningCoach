<?php

namespace App\Http\Controllers\API\Properties\Races;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties\Races\Gender;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genders = Gender::all();

        return $genders;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gender = request()->validate([
            'name' => 'required|string|min:3',
        ]);

        $gender = Gender::create($gender);

        return response()->json($gender, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Races\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function show(Gender $gender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Properties\Races\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gender $gender)
    {
        request()->validate([
            'name' => 'required|min:3',
        ]);

        $gender->update(request(['name']));

        return response()->json($gender, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Properties\Races\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gender $gender)
    {
        $gender->delete();

        return response()->json(null, 204);
    }
}
