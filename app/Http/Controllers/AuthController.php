<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // --- REGISTER LOGIC ---
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama_user' => 'required|string|max:255',
            'username'  => 'required|string|max:20|unique:user',
            'email'     => 'required|string|email|max:100|unique:user',
            'password'  => 'required|string|min:8',
        ]);

        $user = User::create([
            'nama_user' => $validated['nama_user'],
            'username'  => $validated['username'],
            'email'     => $validated['email'],
            'password'  => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->intended('/dashboard');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) 
            $request->session()->regenerate();
            
            return redirect()->intended('/landing_page');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
