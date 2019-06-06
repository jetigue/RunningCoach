<?php

namespace App\Http\Controllers\Coach;

use App\Filters\AthleteFilter;
use App\Http\Controllers\Controller;
use App\Models\Athlete;
use Illuminate\Http\Request;

class AthleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AthleteFilter $filters)
    {
        $athletes = Athlete::filter($filters)->orderBy('last_name')->get();

        if (request()->expectsJson())
        {
            return $athletes;
        }

        return view('athletes.index', compact('athletes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function show(Athlete $athlete)
    {
        //
    }
}
