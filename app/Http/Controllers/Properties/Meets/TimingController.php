<?php

namespace App\Http\Controllers\Properties\Meets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties\Meets\Timing;

class TimingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timing = Timing::all();

        if (request()->expectsJson()) {
            return $timing;
        }

        return view('properties.meets.timing.index', compact('timing'));
    }
}
