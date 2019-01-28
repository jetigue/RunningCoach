<?php

namespace App\Http\Controllers\Properties\Meets;

use App\Filters\NameFilter;
use App\Models\Properties\Meets\Name;
use App\Http\Controllers\Controller;

class NameController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \App\Filters\NameFilter $filters
     * @return \Illuminate\Http\Response
     */
    public function index(NameFilter $filters)
    {
        $meetNames = Name::filter($filters)
            ->with('season')
            ->orderBy('name')
            ->get();

        return view('properties.meets.names.index', compact('meetNames'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properties\Meets\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function show(Name $name)
    {
        //
    }
}