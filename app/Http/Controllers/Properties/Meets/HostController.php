<?php

namespace App\Http\Controllers\Properties\Meets;

use App\Models\Properties\Meets\Host;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hosts = Host::all();

        if (request()->expectsJson())
        {
            return $hosts;
        }

        return view('properties.meets.hosts.index', compact('hosts'));
    }
}
