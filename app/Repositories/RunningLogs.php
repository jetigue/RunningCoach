<?php

namespace App\Repositories;

use App\Models\Admin\Calendar;
use App\Models\RunningLog\RunningLog;
use Auth;
use Carbon\Carbon;
use DB;

class RunningLogs
{
    public function all()
    {
        $all = RunningLog::orderBy('run_date', 'desc')->get();

        return $all;
    }

    public function totalMileage()
    {
        $totalMileage = RunningLog::all()->where('user_id', Auth::user()->id)->sum('distance');

        return $totalMileage;
    }

    public function totalSummerMileage()
    {
        $totalSummerMileage = RunningLog::all()
            ->where('user_id', Auth::user()->id)
            ->where('run_date', '>', '2019-05-12')
            ->where('run_date', '<', '2019-08-03')
            ->sum('distance');

        return $totalSummerMileage;
    }

    public function totalSummerMileagePerRunner()
    {
        $totalSummerMileagePerRunner = RunningLog::select(
            DB::raw('
                user_id,
                sum(distance) as distance,
                sum(total_seconds) as total_seconds,
                avg(distance) as average
                '))
            ->groupBy('user_id')
            ->where('run_date', '>', '2019-05-12')
            ->where('run_date', '<', '2019-08-03')
            ->orderBy('distance', 'desc')
            ->get();

        return $totalSummerMileagePerRunner;
    }

    public function totalMileageThisWeek()
    {
        $totalMileageThisWeek = RunningLog::all()
            ->where('user_id', Auth::user()->id)
            ->where('run_date', '>=', Carbon::today()->startOfWeek()->subDay())
            ->where('run_date', '<=', Carbon::today()->endOfWeek()->subDay())
            ->sum('distance');

        return $totalMileageThisWeek;
    }

    public function totalMileageThisMonth()
    {
        $totalMileageThisMonth = RunningLog::all()
            ->where('user_id', Auth::user()->id)
            ->where('run_date', '>=', Carbon::today()->startOfMonth())
            ->where('run_date', '<=', Carbon::today()->endOfMonth())
            ->sum('distance');

        return $totalMileageThisMonth;
    }

    public function totalMileageThisYear()
    {
        $totalMileageThisYear = RunningLog::all()
            ->where('user_id', Auth::user()->id)
            ->where('run_date', '>=', Carbon::today()->startOfYear())
            ->where('run_date', '<=', Carbon::today()->endOfYear())
            ->sum('distance');

        return $totalMileageThisYear;
    }

    public function weeklySummerMileage()
    {
        $weeklySummerMileage = RunningLog::select(DB::raw('calendar.week as week, ifnull(sum(distance), 0) as distance'))
            ->groupBy('week', 'user_id')
            ->rightJoin('calendar', function ($join) {
                $join->on('run_date', '=', 'calendar.calendar_date')
                    ->where('user_id', Auth::user()->id);
            })
            ->whereBetween('calendar.calendar_date', ['2019-05-12', '2019-08-03'])
            ->pluck('distance', 'week');

        return $weeklySummerMileage;
    }

    public function RunnersWeeklySummerMileage()
    {
        $runnersWeeklySummerMileage = RunningLog::select(DB::raw('calendar.week as week, ifnull(sum(distance), 0) as distance'))
            ->groupBy('week', 'user_id')
            ->rightJoin('calendar', function ($join) {
                $join->on('run_date', '=', 'calendar.calendar_date')
                    ->where('user_id', Auth::user()->id);
            })
            ->whereBetween('calendar.calendar_date', ['2019-05-12', '2019-08-03'])
            ->pluck('distance', 'week');

        return $runnersWeeklySummerMileage;
    }

    public function mileageLastWeek()
    {
        $mileageLastWeek = RunningLog::select(DB::raw('DATE_FORMAT(calendar.calendar_date, "%b%e") as day, ifnull(sum(distance), 0) as distance'))
            ->groupBy('calendar_date', 'user_id')
            ->rightJoin('calendar', function ($join) {
                $join->on('run_date', '=', 'calendar.calendar_date')
                ->where('user_id', Auth::user()->id);
            })
            // ->orderBy('calendar.calendar_date')
             ->whereBetween('calendar.calendar_date', [Carbon::now()->subWeek(), Carbon::now()])
            ->pluck('distance', 'day');

        return $mileageLastWeek;
    }

    public function percentRunType()
    {
        $percentRunType = RunningLog::select(DB::raw('run_types.name as runType, sum(distance) as distance'))
                ->join('run_types', 'run_type_id', '=', 'run_types.id')
                ->groupBy('runType')
                ->where('user_id', Auth::user()->id)
                ->pluck('distance', 'runType');

        return $percentRunType;
    }

    public function percentTerrainType()
    {
        $percentTerrainType = RunningLog::select(DB::raw('terrain_types.name as terrainType, sum(distance) as distance'))
                ->join('terrain_types', 'terrain_type_id', '=', 'terrain_types.id')
                ->groupBy('terrainType')
                ->where('user_id', Auth::user()->id)
                ->pluck('distance', 'terrainType');

        return $percentTerrainType;
    }

    public function percentRunEffort()
    {
        $percentRunEffort = RunningLog::select(DB::raw('run_efforts.name as runEffort, sum(distance) as distance'))
                ->join('run_efforts', 'run_effort_id', '=', 'run_efforts.id')
                ->groupBy('runEffort')
                ->where('user_id', Auth::user()->id)
                ->pluck('distance', 'runEffort');

        return $percentRunEffort;
    }

    public function percentRunFeeling()
    {
        $percentRunFeeling = RunningLog::select(DB::raw('run_feelings.name as runFeeling, sum(distance) as distance'))
                ->join('run_feelings', 'run_feeling_id', '=', 'run_feelings.id')
                ->groupBy('runFeeling')
                ->where('user_id', Auth::user()->id)
                ->pluck('distance', 'runFeeling');

        return $percentRunFeeling;
    }
}
