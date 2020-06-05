<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training\TrainingPeriod;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrainingPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $periods = TrainingPeriod::all();

        if (request()->expectsJson()) {
            return $periods;
        }

        return view('training.periods.index', compact('periods'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training\TrainingPeriod  $trainingPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingPeriod $trainingPeriod)
    {
        //
    }

}
