<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionController extends Controller
{
    public function roleIndex()
    {
        $roles = DB::table('roles')->whereNotIn('name', ['admin', 'user'])->get();
        return view('spite-permission.role.index', compact('roles'));
    }
    public function roleStore()
    {
        request()->validate([
            'name' => 'required|unique:roles,name',
        ]);
        Role::create([
            'name' => request()->name,
        ]);

        return back();
    }
    public function roleDestroy(Role $role)
    {
        if ($role) {
            $role->delete();
        };
        return back();
    }
    public function permissionIndex()
    {
        $permissions = DB::table('permissions')->get();
        return view('spite-permission.permission.index', compact('permissions'));
    }
    public function permissionStore()
    {
        request()->validate([
            'name' => 'required|unique:permissions,name',
        ]);
        Permission::create([
            'name' => request()->name,
        ]);

        return back();
    }
    public function permissionDestroy(Permission $permission)
    {
        if ($permission) {
            $permission->delete();
        };
        return back();
    }
    public function assignPermissionToRoleShow($roleId)
    {
        $role = Role::where('id', $roleId)->firstOrFail();
        $hasPermissions = $role->permissions->pluck('name')->toArray();
        $permissions = DB::table('permissions')->get();

        return view('spite-permission.permission.assign-permission', compact('role', 'permissions', 'hasPermissions'));
    }
    public function assignPermissionToRoleStore(Request $request)
    {
        $roleId = $request->roleId;

        $role = Role::find($roleId);

        $permissions = Permission::whereIn('id', $request->permissions)->get()->pluck('name');

        $role->syncPermissions($permissions->toArray());
        return back();
    }
    public function assignRole(Request $request, $userId)
    {
        $user = User::find($userId);
        $user->syncRoles($request->role);
        return back();

    }
}
