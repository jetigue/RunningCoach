<?php

namespace App\Http\Controllers\Admin;

use App\Models\Properties\Races\Title;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TitleController extends Controller
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
        $titles = Title::all();

        if (request()->expectsJson())
        {
            return $titles;
        }

        return view('properties.races.titles.index', compact('titles'));
    }
}
