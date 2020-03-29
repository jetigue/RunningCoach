<?php

namespace App\Http\Controllers\Coach;

use App\Filters\NameFilter;
use App\Http\Controllers\Controller;
use App\Models\Properties\Meets\Track\Name;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TrackMeetNameController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach');
    }

    /**
     * Display a listing of the resource.
     * @param NameFilter $filters
     * @return Factory|View
     */
    public function index(NameFilter $filters)
    {
        $meetNames = Name::filter($filters)
            ->orderBy('name')
            ->get();

        return view('properties.meets.names.track.index', compact('meetNames'));
    }

    /**
     * Display the specified resource.
     *
     * @param Name $name
     * @return void
     */
    public function show(Name $name)
    {
        //
    }
}
