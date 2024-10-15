<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\adminLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin/login',[adminLoginController::class, "login"])->name('admin.login');
Route::post('/admin/submit',[adminLoginController::class, "submit"])->name('admin.submit');

Route::get('/admin/dashboard',[AdminController::class, "dashboard"])->name('admin.dashboard');
