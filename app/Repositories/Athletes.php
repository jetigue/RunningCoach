<?php

namespace App\Repositories;

use App\Models\Athlete;
use Carbon\Carbon;

class Athletes
{

    public function all()
    {
        $all = Athlete::orderBy('last_name', 'asc')->get();

        return $all;
    }

    public function freshmen()
    {
        if (Carbon::now()->month >= 7) {
            $freshmen = Athlete::where('grad_year', '=', Carbon::now()->year + 4)->get();
        } else {
            $freshmen = Athlete::where('grad_year', '=', Carbon::now()->year + 3)->get();
        }
        return $freshmen;
    }

    public function sophomores()
    {
        if (Carbon::now()->month >= 7) {
            $sophomores = Athlete::where('grad_year', '=', Carbon::now()->year + 3)->get();
        } else {
            $sophomores = Athlete::where('grad_year', '=', Carbon::now()->year + 2)->get();
        }
        return $sophomores;
    }

    public function juniors()
    {
        if (Carbon::now()->month >= 7) {
            $juniors = Athlete::where('grad_year', '=', Carbon::now()->year + 2)->get();
        } else {
            $juniors = Athlete::where('grad_year', '=', Carbon::now()->year + 1)->get();
        }
        return $juniors;
    }

    public function seniors()
    {
        if (Carbon::now()->month >= 7) {
            $seniors = Athlete::where('grad_year', '=', Carbon::now()->year + 1)->get();
        } else {
            $seniors = Athlete::where('grad_year', '=', Carbon::now()->year + 0)->get();
        }
        return $seniors;
    }

    public function alumnus()
    {
        if (Carbon::now()->month >= 7) {
            $alumnus = Athlete::where('grad_year', '=', Carbon::now()->year + 0)->get();
        } else {
            $alumnus = Athlete::where('grad_year', '<', Carbon::now()->year)->get();
        }
        return $alumnus;
    }

    public function boys()
    {
        $boys = Athlete::where('sex', '=', 'm')->get();

        return $boys;
    }

    public function girls()
    {
        $girls = Athlete::where('sex', '=', 'f')->get();

        return $girls;
    }

    public function active()
    {
        $active = Athlete::where('status', '=', 'a')->get();

        return $active;
    }

    public function inactive()
    {
        $inactive = Athlete::where('status', '=', 'i')->get();

        return $inactive;
    }

    public function activeFreshmenBoys()
    {
        if (Carbon::now()->month >= 7) {
            $freshmen = Athlete::where('grad_year', '=', Carbon::now()->year + 4)
                ->where('status', '=', 'a')
                ->where('sex', '=', 'm')
                ->get();
        } else {
            $freshmen = Athlete::where('grad_year', '=', Carbon::now()->year + 3)
                ->where('status', '=', 'a')
                ->where('sex', '=', 'm')
                ->get();
        }

        return $freshmen;
    }

    public function activeSophomoreBoys()
    {
        if (Carbon::now()->month >= 7) {
            $sophomores = Athlete::where('grad_year', '=', Carbon::now()->year + 3)
                ->where('status', '=', 'a')
                ->where('sex', '=', 'm')
                ->get();
        } else {
            $sophomores = Athlete::where('grad_year', '=', Carbon::now()->year + 2)
                ->where('status', '=', 'a')
                ->where('sex', '=', 'm')
                ->get();
        }

        return $sophomores;
    }

    public function activeJuniorBoys()
    {
        if (Carbon::now()->month >= 7) {
            $juniors = Athlete::where('grad_year', '=', Carbon::now()->year + 2)
                ->where('status', '=', 'a')
                ->where('sex', '=', 'm')
                ->get();
        } else {
            $juniors = Athlete::where('grad_year', '=', Carbon::now()->year + 1)
                ->where('status', '=', 'a')
                ->where('sex', '=', 'm')
                ->get();
        }

        return $juniors;
    }

    public function activeSeniorBoys()
    {
        if (Carbon::now()->month >= 7) {
            $seniors = Athlete::where('grad_year', '=', Carbon::now()->year + 1)
                ->where('status', '=', 'a')
                ->where('sex', '=', 'm')
                ->get();
        } else {
            $seniors = Athlete::where('grad_year', '=', Carbon::now()->year + 0)
                ->where('status', '=', 'a')
                ->where('sex', '=', 'm')
                ->get();
        }

        return $seniors;
    }

    public function activeFreshmenGirls()
    {
        if (Carbon::now()->month >= 7) {
            $freshmen = Athlete::where('grad_year', '=', Carbon::now()->year + 4)
                ->where('status', '=', 'a')
                ->where('sex', '=', 'f')
                ->get();
        } else {
            $freshmen = Athlete::where('grad_year', '=', Carbon::now()->year + 3)
                ->where('status', '=', 'a')
                ->where('sex', '=', 'f')
                ->get();
        }

        return $freshmen;
    }

    public function activeSophomoreGirls()
    {
        if (Carbon::now()->month >= 7) {
            $sophomores = Athlete::where('grad_year', '=', Carbon::now()->year + 3)
                ->where('status', '=', 'a')
                ->where('sex', '=', 'f')
                ->get();
        } else {
            $sophomores = Athlete::where('grad_year', '=', Carbon::now()->year + 2)
                ->where('status', '=', 'a')
                ->where('sex', '=', 'f')
                ->get();
        }

        return $sophomores;
    }

    public function activeJuniorGirls()
    {
        if (Carbon::now()->month >= 7) {
            $juniors = Athlete::where('grad_year', '=', Carbon::now()->year + 2)
                ->where('status', '=', 'a')
                ->where('sex', '=', 'f')
                ->get();
        } else {
            $juniors = Athlete::where('grad_year', '=', Carbon::now()->year + 1)
                ->where('status', '=', 'a')
                ->where('sex', '=', 'f')
                ->get();
        }

        return $juniors;
    }

    public function activeSeniorGirls()
    {
        if (Carbon::now()->month >= 7) {
            $seniors = Athlete::where('grad_year', '=', Carbon::now()->year + 1)
                ->where('status', '=', 'a')
                ->where('sex', '=', 'f')
                ->get();
        } else {
            $seniors = Athlete::where('grad_year', '=', Carbon::now()->year + 0)
                ->where('status', '=', 'a')
                ->where('sex', '=', 'f')
                ->get();
        }

        return $seniors;
    }
}
