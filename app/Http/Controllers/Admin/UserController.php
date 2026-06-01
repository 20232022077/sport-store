<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();

        return view('admin.user.index', ['data' => $data]);
    }

    public function show($id)
    {
        $data  = User::find($id);
        $roles = Role::all();

        return view('admin.user.show', [
            'data'  => $data,
            'roles' => $roles,
        ]);
    }

    public function addrole(Request $request, $id)
    {
        $request->validate(['role_id' => 'required']);

        $exists = UserRole::where('user_id', $id)->where('role_id', $request->role_id)->first();

        if (!$exists) {
            $userRole          = new UserRole();
            $userRole->user_id = $id;
            $userRole->role_id = $request->role_id;
            $userRole->save();
        }

        return redirect()->route('admin.user.show', $id)->with('success', 'Role assigned successfully.');
    }

    public function deleterole($user_id, $role_id)
    {
        UserRole::where('user_id', $user_id)->where('role_id', $role_id)->delete();

        return redirect()->route('admin.user.show', $user_id)->with('success', 'Role removed successfully.');
    }
}
