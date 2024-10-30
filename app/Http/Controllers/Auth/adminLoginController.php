<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminLoginController extends Controller
{
    public function login()
    {
        return view('Auth.admin_login');
    }

    public function submit(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',

        ]);


        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['login_error' => 'Username atau password salah'])->onlyInput('username');

    }
}
