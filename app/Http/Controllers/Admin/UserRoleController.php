<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class UserRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles = Role::all();

        if (request()->expectsJson())
        {
            return $roles;
        }

        return view('user.roles.index', compact('roles'));
    }
}
