<?php

namespace App\Http\Controllers\API\Users;

use App\Models\Users\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
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

        return $roles;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
         return $this->storeRole($request);

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


    /**
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Role $role)
    {
        return $this->updateRole($request, $role);
    }

    /**
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json(null, 204);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function storeRole(Request $request): \Illuminate\Http\JsonResponse
    {
        $role = request()->validate([
            'name' => 'required|string|min:3'
        ]);

        $role = Role::create($role);

        return response()->json($role, 201);
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    protected function updateRole(Request $request, Role $role): \Illuminate\Http\JsonResponse
    {
        request()->validate([
            'name' => 'required|min:3'
        ]);

        $role->update(request(['name']));

        return response()->json($role, 200);
    }
}
