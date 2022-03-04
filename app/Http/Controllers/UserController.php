<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Balance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {

        if ($request->has('find')) {
            $users = User::where('name', 'LIKE', '%' . $request->find . '%')->orWhere('username', 'LIKE', '%' . $request->find . '%')->orWhere('role_id', 'LIKE', '%' . $request->find . '%')->paginate(1000);
        } else {
            $users = User::select('*')->orderBy('created_at', 'ASC')->paginate(8);
        };
        $roles = Role::all();
        return view('admin.users.index', compact(['users', 'roles']));
    }

    public function auth(Request $request)
    {
        if ($request->has('find')) {
            $users = User::where('name', 'LIKE', '%' . $request->find . '%')->orWhere('username', 'LIKE', '%' . $request->find . '%')->paginate(1000);
        } else {
            $users = User::paginate(10);
        };
        $roles = Role::all();
        return view('admin.users.admin', compact(['users', 'roles']));
    }

    public function create(Request $request)
    {
        $usercreate = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'email_verified_at' => now(),
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        Balance::create([
            'user_id' => $usercreate->id,
            'balance' => '50000',
        ]);

        notify("User added successfully!", "", "success");
        return redirect()->route('auth.users');
    }

    public function delete($id)
    {
        $users = User::find($id);
        $users->delete();

        notify("User deleted successfully!", "", "error");
        return redirect()->route('auth.users');
    }

    public function edit($id)
    {
        $users = User::find($id);
        $roles = Role::all();
        return view ('admin.users.edit', compact(['users', 'roles']));
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->update($request->all());
        notify("User updated successfully!", "", "success");
        return redirect()->route('auth.users');
    }
}
