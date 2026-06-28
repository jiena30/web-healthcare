<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;   
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function register() {
    return view('register');
}

    

    public function login() {
        return view('login');
    }

   public function loginProcess(Request $request)
{
    $credentials = $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // TAMBAHKAN INI AGAR SESSION('foto') TERISI
        $user = Auth::user(); 
        session(['foto' => $user->foto, 'nama_lengkap' => $user->nama_lengkap]);

        return redirect('/beranda')->with('success', 'Login berhasil!');
    }

    return back()->with('error', 'Email atau password salah.');
}

    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login')->with('success', 'Berhasil keluar sistem.');
}
}