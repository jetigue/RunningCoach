<?php

namespace App\Http\Controllers\API\Training;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Training\RunningActivities\IntervalRun;
use App\Models\Training\RunningActivities\SteadyRun;
use Illuminate\Http\Request;

class WorkoutCardController extends Controller
{
    /**
     * Display a listing of the varsity primary warm-ups.
     *
     * @param Calendar $calendar
     * @param Request $request
     * @return void
     */
    public function warmUps(Calendar $calendar, Request $request)
    {
        if ($request->varsity) {
            return SteadyRun::where('training_date', $calendar->calendar_date)
                ->where('steady_run_type_id', 1)
                ->where('workout', $request->workout)
                ->where('varsity', $request->varsity)
                ->with('intensity', 'runType')
                ->get();
        } else if ($request->junior_varsity) {
            return SteadyRun::where('training_date', $calendar->calendar_date)
                ->where('steady_run_type_id', 1)
                ->where('workout', $request->workout)
                ->where('junior_varsity', $request->junior_varsity)
                ->with('intensity', 'runType')
                ->get();
        } else if ($request->open) {
            return SteadyRun::where('training_date', $calendar->calendar_date)
                ->where('steady_run_type_id', 1)
                ->where('workout', $request->workout)
                ->where('open', $request->open)
                ->with('intensity', 'runType')
                ->get();
        } else {
            return SteadyRun::where('training_date', $calendar->calendar_date)
                ->where('steady_run_type_id', 1)
                ->where('workout', $request->workout)
                ->where('beginner', $request->beginner)
                ->with('intensity', 'runType')
                ->get();
        }
    }

    /**
     * Display a listing of the varsity primary steady-runs.
     *
     * @param Calendar $calendar
     * @param Request $request
     * @return void
     */
    public function steadyRuns(Calendar $calendar, Request $request)
    {
        if ($request->varsity) {
            return SteadyRun::where('training_date', $calendar->calendar_date)
                ->whereNotIn('steady_run_type_id', [1, 2])
                ->where('workout', $request->workout)
                ->where('varsity', $request->varsity)
                ->with('intensity', 'runType')
                ->get();
        } else if ($request->junior_varsity) {
            return SteadyRun::where('training_date', $calendar->calendar_date)
                ->whereNotIn('steady_run_type_id', [1, 2])
                ->where('workout', $request->workout)
                ->where('junior_varsity', $request->junior_varsity)
                ->with('intensity', 'runType')
                ->get();
        } else if ($request->open) {
            return SteadyRun::where('training_date', $calendar->calendar_date)
                ->whereNotIn('steady_run_type_id', [1, 2])
                ->where('workout', $request->workout)
                ->where('open', $request->open)
                ->with('intensity', 'runType')
                ->get();
        } else {
            return SteadyRun::where('training_date', $calendar->calendar_date)
                ->whereNotIn('steady_run_type_id', [1, 2])
                ->where('workout', $request->workout)
                ->where('beginner', $request->beginner)
                ->with('intensity', 'runType')
                ->get();
        }
    }
    /**
     * Display a listing of the varsity primary interval runs.
     *
     * @param Calendar $calendar
     * @param Request $request
     * @return void
     */
    public function intervalRuns(Calendar $calendar, Request $request)
    {
        if ($request->varsity) {
            return IntervalRun::where('training_date', $calendar->calendar_date)
                ->where('workout', $request->workout)
                ->where('varsity', $request->varsity)
                ->with('intensity', 'runType')
                ->get();
        } else if ($request->junior_varsity) {
            return IntervalRun::where('training_date', $calendar->calendar_date)
                ->where('workout', $request->workout)
                ->where('junior_varsity', $request->junior_varsity)
                ->with('intensity', 'runType')
                ->get();
        } else if ($request->open) {
            return IntervalRun::where('training_date', $calendar->calendar_date)
                ->where('workout', $request->workout)
                ->where('open', $request->open)
                ->with('intensity', 'runType')
                ->get();
        } else {
            return IntervalRun::where('training_date', $calendar->calendar_date)
                ->where('workout', $request->workout)
                ->where('beginner', $request->beginner)
                ->with('intensity', 'runType')
                ->get();
        }
    }

    /**
     * Display a listing of the varsity primary cool-downs.
     *
     * @param Calendar $calendar
     * @param Request $request
     * @return void
     */
    public function coolDowns(Calendar $calendar, Request $request)
    {
        if ($request->varsity) {
            return SteadyRun::where('training_date', $calendar->calendar_date)
                ->where('steady_run_type_id', 2)
                ->where('workout', $request->workout)
                ->where('varsity', $request->varsity)
                ->with('intensity', 'runType')
                ->get();
        } else if ($request->junior_varsity) {
            return SteadyRun::where('training_date', $calendar->calendar_date)
                ->where('steady_run_type_id', 2)
                ->where('workout', $request->workout)
                ->where('junior_varsity', $request->junior_varsity)
                ->with('intensity', 'runType')
                ->get();
        } else if ($request->open) {
            return SteadyRun::where('training_date', $calendar->calendar_date)
                ->where('steady_run_type_id', 2)
                ->where('workout', $request->workout)
                ->where('open', $request->open)
                ->with('intensity', 'runType')
                ->get();
        } else {
            return SteadyRun::where('training_date', $calendar->calendar_date)
                ->where('steady_run_type_id', 2)
                ->where('workout', $request->workout)
                ->where('beginner', $request->beginner)
                ->with('intensity', 'runType')
                ->get();
        }
    }

}
