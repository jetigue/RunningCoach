<?php

namespace App\Http\Controllers\Properties\Meets;

use App\Models\Properties\Meets\Name;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties\General\Season;

class NameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($seasonSlug = request('season')) {
            $season = Season::where('slug', $seasonSlug)->firstOrFail();
            
            $names = Name::where('season_id', $season->id)->with('season')->orderBy('name');

            $names = $names->get();

        } else {
            $names = Name::with('season')->orderBy('name')->get();
        }
        
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