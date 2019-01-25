<?php

namespace App\Http\Controllers\Properties\Meets;

use App\Models\Properties\Meets\Name;
use App\Filters\NameFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties\General\Season;

/**
 * Class NameController
 * @package App\Http\Controllers\Properties\Meets
 */
class NameController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \App\Filters\NameFilter $filters
     * @return \Illuminate\Http\Response
     */
    public function index(NameFilter $filters)
    {
        $names = Name::filter($filters)->with('season')->orderBy('name')->get();

        return view('properties.meets.names.index', compact('names'));
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