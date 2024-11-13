<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        return view('admin.users.create');
    }
     public function edit(User $user)
     {
         $roles = Role::all();
         // $user = User::find($id);
         return view('admin.users.edit', compact('user', 'roles'));
     }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);
        User::create($validated);
        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users.index');
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3']
        ]);
        User::find($id)->update($validated);
        return redirect()->route('admin.users.index');
    }
   public function giveRole(Request $request, User $user)
    {
        // dd($request->permissions);
        // Sync permissions with the user, adding new ones and revoking any that are unchecked
        $roleIds = $request->input('roles', []);
        $roles = Role::whereIn('id', $roleIds)->pluck('name')->toArray();
        // dd($permissions);

        $user->syncRoles($roles);
        
        return redirect()->back()->with('success', 'Roles updated successfully!');
    } 
}
