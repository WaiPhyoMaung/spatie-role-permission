<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }
    public function create()
    {
        return view('admin.roles.create');
    }
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        // $role = Role::find($id);
        return view('admin.roles.edit', compact('role', 'permissions'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3']
        ]);
        Role::create($validated);
        return redirect()->route('admin.roles.index');
    }

    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('admin.roles.index');
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3']
        ]);
        Role::find($id)->update($validated);
        return redirect()->route('admin.roles.index');
    }
    public function givePermission(Request $request, Role $role)
    {
        // dd($request->permissions);
        // Sync permissions with the role, adding new ones and revoking any that are unchecked
        $permissionIds = $request->input('permissions', []);
        $permissions = Permission::whereIn('id', $permissionIds)->pluck('name')->toArray();
        // dd($permissions);

        $role->syncPermissions($permissions);
        
        return redirect()->back()->with('success', 'Permissions updated successfully!');
    }
    
}
