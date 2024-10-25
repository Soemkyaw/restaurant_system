<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function checkLogin(Request $request)
    {
        // dd($request->all());
        $attributes = $request->validate([
            'email' => ['required', 'min:3', 'max:100', 'email'],
            'password' => ['required','min:3','max:100']
        ]);

        if (Auth::attempt($attributes)) {
            return redirect('/dashboard');
        }

        return redirect()->back()->withErrors(['email'=>'The provided credentials do not match our records.']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
