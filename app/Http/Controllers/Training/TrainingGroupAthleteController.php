<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Models\Training\Group;
use App\Repositories\Athletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingGroupAthleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('coach');
    }

    public function index(Group $group)
    {
        $crimson = Group::firstWhere('name', 'Crimson');
        $black = Group::firstWhere('name', 'Black');
        $white= Group::firstWhere('name', 'White');
        $green = Group::firstWhere('name', 'Green');
        $none = Group::firstWhere('name', 'None');

        $athletes = DB::table('athletes')->where('status', 'a')->orderBy('last_name')->orderBy('first_name')
        ->select('id', 'first_name', 'last_name', 'sex', 'training_group_id');

        $athletes2 = clone $athletes;
        $athletes3 = clone $athletes;
        $athletes4 = clone $athletes;
        $athletes5 = clone $athletes;
        $athletes6 = clone $athletes;
        $athletes7 = clone $athletes;
        $athletes8 = clone $athletes;
        $athletes9 = clone $athletes;
        $athletes10 = clone $athletes;

        $crimsonGroupMales = $athletes->where('training_group_id', $crimson->id)->where('sex', 'm')->get();
        $blackGroupMales = $athletes2->where('training_group_id', $black->id)->where('sex', 'm')->get();
        $whiteGroupMales = $athletes3->where('training_group_id', $white->id)->where('sex', 'm')->get();
        $greenGroupMales = $athletes4->where('training_group_id', $green->id)->where('sex', 'm')->get();
        $noneGroupMales = $athletes5->where('training_group_id', $none->id)->where('sex', 'm')->get();

        $crimsonGroupFemales = $athletes6->where('training_group_id', $crimson->id)->where('sex', 'f')->get();
        $blackGroupFemales = $athletes7->where('training_group_id', $black->id)->where('sex', 'f')->get();
        $whiteGroupFemales = $athletes8->where('training_group_id', $white->id)->where('sex', 'f')->get();
        $greenGroupFemales = $athletes9->where('training_group_id', $green->id)->where('sex', 'f')->get();
        $noneGroupFemales = $athletes10->where('training_group_id', $none->id)->where('sex', 'f')->get();

        return view('athletes.trainingGroups.index', compact(
            'crimson',
            'black',
            'white',
            'green',
            'none',
            'crimsonGroupMales',
            'blackGroupMales',
            'whiteGroupMales',
            'greenGroupMales',
            'noneGroupMales',
            'crimsonGroupFemales',
            'blackGroupFemales',
            'whiteGroupFemales',
            'greenGroupFemales',
            'noneGroupFemales',
        ));
    }
}
