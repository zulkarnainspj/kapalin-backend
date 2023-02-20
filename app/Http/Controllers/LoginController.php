<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (auth()->user()->role == 0) {
                return redirect('/admin');
            } elseif (auth()->user()->role == 1) {
                return redirect('/employee');
            }else{
                Auth::logout();
                return back()->with('loginError', 'Login failed!');
            }
        } else {
            return view('login.index', [
                'title' => 'Login'
            ]);
        }
    }

    public function login(Request $request)
    {
        
        $user_credential = [
            'email' => strtolower($request->email),
            'password' => $request->password,
            'status' => 1
        ];

        if (Auth::attempt($user_credential)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
