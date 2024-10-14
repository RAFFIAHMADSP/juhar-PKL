<?php

use App\Http\Controllers\Auth\adminLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin/login',[adminLoginController::class, "login"])->name('admin.login');
