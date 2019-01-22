<?php

namespace App\Http\Controllers\Users;

use App\Models\Users\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        if (request()->expectsJson())
        {
            return $roles;
        }

        return view('users.roles.index', compact('roles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }
}
