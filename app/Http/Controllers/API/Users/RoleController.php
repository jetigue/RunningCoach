<?php

namespace App\Http\Controllers\API\Users;

use App\Models\Users\Role;
use Illuminate\Http\JsonResponse;
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
     * @param Role $roles
     * @return Role
     */
    public function index(Role $roles)
    {
        return $roles;
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
         return $this->storeRole($request);

    }

    /**
     * @param Request $request
     * @param Role $role
     * @return JsonResponse
     */
    public function update(Request $request, Role $role)
    {
        return $this->updateRole($request, $role);
    }

    /**
     * @param Role $role
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json(null, 204);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    protected function storeRole(Request $request): JsonResponse
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
     * @return JsonResponse
     */
    protected function updateRole(Request $request, Role $role): JsonResponse
    {
        request()->validate([
            'name' => 'required|min:3'
        ]);

        $role->update(request(['name']));

        return response()->json($role, 200);
    }
}
