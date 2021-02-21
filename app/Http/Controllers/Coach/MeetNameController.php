<?php

namespace App\Http\Controllers\Coach;

use App\Filters\NameFilter;
use App\Http\Controllers\Controller;
use App\Models\Properties\Meets\Name;
use App\Models\Properties\Meets\Track\Name as TrackName;

class MeetNameController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach');
    }

    /**
     * Display a listing of the resource.
     * @param \App\Filters\NameFilter $filters
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetNames = TrackName::query()
            ->with('season')
            ->orderBy('name')
            ->get();

        return view('properties.meets.names.index', compact('meetNames'));
    }
}
