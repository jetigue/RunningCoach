<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Users\Role;
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

        if (request()->expectsJson()) {
            return $roles;
        }

        return view('users.roles.index', compact('roles'));
    }
}
