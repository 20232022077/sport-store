<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $data = Role::all();

        return view('admin.role.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255']);

        $data = new Role();
        $data->title = $request->title;
        $data->save();

        return redirect()->route('admin.role.index')->with('success', 'Role created successfully.');
    }

    public function destroy($id)
    {
        Role::find($id)->delete();

        return redirect()->route('admin.role.index')->with('success', 'Role deleted successfully.');
    }
}
