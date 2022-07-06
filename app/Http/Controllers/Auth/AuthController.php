<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function userRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => ['required', Password::min(8)->numbers()]
        ]);

        $validated['name'] = ucwords($validated['name']);
        $validated['password'] = bcrypt($validated['password']);
        
        User::create($validated);

        return redirect('/login')->with('Success','Registration Successfully');
    }

    public function userLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:dns',
            'password' => ['required', Password::min(8)->numbers()]
        ]);

        if (Auth::attempt($validated))
        {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        
        return back()->with('loginErr','Please login again!!!');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('Success','Do you want login again ?');
    }
}
