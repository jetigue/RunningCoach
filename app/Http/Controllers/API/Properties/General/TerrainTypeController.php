<?php

namespace App\Http\Controllers\API\Properties\General;

use App\Models\Properties\General\TerrainType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TerrainTypeController extends Controller
{

    /**
     * GenderController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin')->except('index');

        $this->middleware('auth')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terrainTypes = TerrainType::all();

        return $terrainTypes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $terrainType = request()->validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string'
        ]);

        $terrainType = TerrainType::create($terrainType);

        return response()->json($terrainType, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\General\TerrainType  $terrainType
     * @return \Illuminate\Http\Response
     */
    public function show(TerrainType $terrainType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Properties\General\TerrainType  $terrainType
     * @return \Illuminate\Http\Response
     */
    public function edit(TerrainType $terrainType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Properties\General\TerrainType  $terrainType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TerrainType $terrainType)
    {
        request()->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5'
        ]);

        $terrainType->update(request(['name', 'description']));

        return response()->json($terrainType, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Properties\General\TerrainType  $terrainType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TerrainType $terrainType)
    {
        $terrainType->delete();

        return response()->json(null, 204);
    }
}
