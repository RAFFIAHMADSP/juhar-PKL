<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class siswaLoginController extends Controller
{
    public function login()
    {
        return view('Auth.siswa_login');
    }

    public function submit(Request $request)
    {
        $credentials = $request->validate([
            'nisn' => 'required',
            'password' => 'required',

        ]);


        if (Auth::guard('siswa')->attempt($credentials)) {
            return redirect()->route('siswa.dashboard');
        }

        return back()->withErrors(['login_eror' => 'nisn atau password salah'])->onlyInput('nisn');

    }
}
