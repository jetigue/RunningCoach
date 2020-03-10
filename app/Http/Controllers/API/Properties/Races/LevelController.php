<?php

namespace App\Http\Controllers\API\Properties\Races;

use App\Http\Controllers\Controller;
use App\Models\Properties\Races\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * LevelController constructor.
     */
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
        $levels = Level::all();

        return $levels;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $level = request()->validate([
            'name' => 'required|string|min:3',
        ]);

        $level = Level::create($level);

        return response()->json($level, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Races\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Properties\Races\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        request()->validate([
            'name' => 'required|min:3',
        ]);

        $level->update(request(['name']));

        return response()->json($level, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Properties\Races\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();

        return response()->json(null, 204);
    }
}
