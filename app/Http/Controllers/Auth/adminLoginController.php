<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminLoginController extends Controller
{
    public function login()
    {
        return view('Auth.admin_login');
    }
}
