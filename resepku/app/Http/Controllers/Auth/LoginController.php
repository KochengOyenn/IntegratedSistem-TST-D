<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $remember_me = $request->remember ? true : false;

        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials, $remember_me)) {
            return redirect(RouteServiceProvider::HOME)->with('success', 'Selamat Datang Kembali ' . Auth::user()->name . '👋');;
        }

        return back()->with('error', 'Login Gagal! akun tidak ditemukan');
    }
}
