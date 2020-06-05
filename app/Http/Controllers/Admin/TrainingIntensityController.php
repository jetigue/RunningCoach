<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training\Intensity;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrainingIntensityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $intensities = Intensity::orderBy('percentVO2Max')->get();

        if (request()->expectsJson()) {
            return $intensities;
        }

        return view('training.intensities.index', compact('intensities'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training\Intensity  $intensity
     * @return \Illuminate\Http\Response
     */
    public function show(Intensity $intensity)
    {
        //
    }
}
