<?php

namespace App\Http\Controllers\API\RunningLog;

use App\Http\Controllers\Controller;
use App\Repositories\RunningLogs;
use Illuminate\Http\Request;

class SummerRunningController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(RunningLogs $runningLogs)
    {
        return $runningLogs->totalSummerMileagePerRunner();
    }
}
