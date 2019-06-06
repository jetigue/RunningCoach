<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRoleController extends Controller
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
