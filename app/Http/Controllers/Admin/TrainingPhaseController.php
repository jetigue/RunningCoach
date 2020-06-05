<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training\TrainingPhase;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrainingPhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $phases = TrainingPhase::with('trainingPeriod')->get();

        if (request()->expectsJson()) {
            return $phases;
        }

        return view('training.phases.index', compact('phases'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training\TrainingPhase  $trainingPhase
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingPhase $trainingPhase)
    {
        //
    }

}
