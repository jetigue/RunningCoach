<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Properties\General\TerrainType;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TerrainTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $terrainTypes = TerrainType::all();

        if (request()->expectsJson()) {
            return $terrainTypes;
        }

        return view('properties.general.terrains.index', compact('terrainTypes'));
    }
}
