<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // FORM LOGIN
    public function formLogin()
    {
        return view('auth.login');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            if ($role === 'admin') {
    return redirect()->route('admin.dashboard');
}

if ($role === 'pegawai') {
    return redirect()->route('pegawai.dashboard');
}


            // role tidak dikenali
            Auth::logout();
            return redirect('/login')->withErrors([
                'email' => 'Role pengguna tidak dikenali'
            ]);
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
