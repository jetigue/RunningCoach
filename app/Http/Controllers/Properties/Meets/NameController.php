<?php

namespace App\Http\Controllers\Properties\Meets;

use App\Models\Properties\Meets\Name;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $names = Name::with('season')->get();

        if (request()->expectsJson()) {
            return $names;
        }

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