<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Models\Properties\Meets\Host;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HostController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $hosts = Host::orderBy('name')->get();

        if (request()->expectsJson()) {
            return $hosts;
        }

        return view('properties.meets.hosts.index', compact('hosts'));
    }
}
