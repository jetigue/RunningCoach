<?php

namespace App\Http\Controllers\Admin;

use App\Models\Properties\Meets\Timing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timing = Timing::all();

        if (request()->expectsJson())
        {
            return $timing;
        }

        return view('properties.meets.timing.index', compact('timing'));
    }
}

    