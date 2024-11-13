<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    } 
    public function create()
    {
        return view('admin.permissions.create');
    }
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permissions.edit', compact('permission'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3']
        ]);
        Permission::create($validated);
        return redirect()->route('admin.permissions.index');
    }
    public function destroy($id)
    {
        Permission::destroy($id);
        return redirect()->route('admin.permissions.index');
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3']
        ]);
        Permission::find($id)->update($validated);
        return redirect()->route('admin.permissions.index');
    }
}
