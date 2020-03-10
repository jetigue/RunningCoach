<?php

namespace App\Http\Controllers\Coach;

use App\Filters\AthleteFilter;
use App\Http\Controllers\Controller;
use App\Models\Athlete;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AthleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $athletes = Athlete::orderBy('last_name')->get();

        if (request()->expectsJson()) {
            return $athletes;
        }

        return view('athletes.index', compact('athletes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return Response
     */
    public function show(Athlete $athlete)
    {
        //
    }
}
