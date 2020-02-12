<?php

namespace App\Http\Controllers\API\Properties\General;

use App\Models\Properties\General\TerrainType;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

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
     * @return TerrainType[]|Collection
     */
    public function index()
    {
        return TerrainType::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
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
     * @param TerrainType $terrainType
     * @return Response
     */
    public function show(TerrainType $terrainType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TerrainType $terrainType
     * @return Response
     */
    public function edit(TerrainType $terrainType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param TerrainType $terrainType
     * @return Response
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
     * @param TerrainType $terrainType
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(TerrainType $terrainType)
    {
        $terrainType->delete();

        return response()->json(null, 204);
    }
}
