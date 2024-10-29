<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index',[
            'roles' => Role::all()
        ]);
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required','min:3'],
        ]);

        Role::create($attributes);

        return redirect()->route('roles');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Role $role,Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:2'],
        ]);

        $role->update($attributes);

        return redirect()->route('roles');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles');
    }
}
