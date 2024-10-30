<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.staffs.index',[
            'users' => User::with('role')->latest()->get()
        ]);
    }


    public function create()
    {
        return view('admin.staffs.create',[
            'roles' => Role::all()
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $attributes = $request->all();
        $attributes['password'] = Hash::make($attributes['password']);

        if ($request->hasFile('avatar')) {
            $attributes['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        User::create($attributes);

        return redirect()->route('staffs');
    }

    public function show(User $user)
    {
        return view('admin.staffs.show',compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.staffs.edit',[
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function update(User $user,StoreUserRequest $request)
    {
        $attributes = $request->all();
        $attributes['password'] = Hash::make($attributes['password']);

        if ($request->hasFile('avatar')) {
            $attributes['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($attributes);

        return redirect()->route('staffs');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back();
    }
}
