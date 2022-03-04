<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::all();
        return view ('admin.roles.index', compact(['roles']));
    }

    public function create(Request $request)
    {
        Role::create($request->all());
        
        notify("Role added successfully!", "", "success");
        return redirect()->route('auth.roles');
    }
    

    public function delete($id)
    {
        
        $roles = Role::find($id);
        $roles->delete();
        
        notify("Role deleted successfully!", "", "error");
        return redirect()->route('auth.roles')->with('success', 'test');
    }

    public function edit($id)
    {
        $roles = Role::find($id);
        return view ('admin.roles.edit', compact(['roles']));
    }

    public function update(Request $request, $id)
    {
        $roles = Role::find($id);
        $roles->update($request->all());
        notify("Role updated successfully!", "", "success");
        return redirect()->route('auth.roles');
    }
}
