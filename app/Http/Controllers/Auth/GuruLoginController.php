<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Egulias\EmailValidator\Validation\EmailValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruLoginController extends Controller
{
    public function login()
    {
        return view('Auth.guru_login');
    }

    public function submit(Request $request){
        $credentials = $request->validate([
            'nip_or_email' => 'required',
            'password' => 'required',
        ]);

        $loginGuru = filter_var($credentials['nip_or_email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'nip';

        if (Auth::guard('guru')->attempt([$loginGuru => $credentials['nip_or_email'], 'password' => $credentials['password']])) {
            return redirect()->route('guru.dashboard');
        }

        return back()->withErrors(['login_error' => 'NIP/Email/Password salah'])
                     ->onlyInput('nip_or_email');
    }

    

}
