<?php

namespace App\Http\Controllers\Admin;

use App\Models\Properties\General\TrackSurface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class TrackSurfaceController extends Controller
{

    /**
     * TrackEventController constructor.
     */
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
        $surfaces = TrackSurface::all();

        if (request()->expectsJson()) {
            return $surfaces;
        }

        return view('properties.general.surfaces.index', compact('surfaces'));
    }
}
