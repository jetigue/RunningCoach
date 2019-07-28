<?php

namespace App\Http\Controllers\Coach;

use App\Models\Physical;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PhysicalController extends Controller
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
    public function index()
    {
//        $physicals = Physical::with('athlete')->latest()->get();
        $physicals = Physical::select(DB::raw('physicals.*'))
//            ->from(DB::raw('(SELECT * FROM physicals ORDER BY created_at) physicals'))
//            ->groupBy('physicals.athlete_id')
            ->leftJoin('athletes', 'athletes.id', '=', 'physicals.athlete_id')
            ->with('athlete')
            ->orderBy('athletes.last_name', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('athletes.physicals.index', compact('physicals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Physical  $physical
     * @return \Illuminate\Http\Response
     */
    public function show(Physical $physical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Physical  $physical
     * @return \Illuminate\Http\Response
     */
    public function edit(Physical $physical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Physical  $physical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Physical $physical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Physical  $physical
     * @return \Illuminate\Http\Response
     */
    public function destroy(Physical $physical)
    {
        //
    }
}
