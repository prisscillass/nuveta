<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view('register.register-page');
    }

    public function store(Request $request) {
        // validate the data
        $validated = $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        // create the user
        User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

        // redirect back
        return redirect()->route('login');
    }

    public function login() {
        return view('register.login-page');
    }

    public function authenticate(Request $request) {
        // validate the data
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!(Auth::attempt($validated))) {
            return redirect()->route('login');
        }
        
        $request->session()->regenerate();
        return redirect()->route('home');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
