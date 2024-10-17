<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\guruController;
use App\Http\Controllers\Auth\adminLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::middleware(['guest'])->group(function(){
    Route::get('/admin/login',[adminLoginController::class, "login"])->name('admin.login');
    Route::post('/admin/submit',[adminLoginController::class, "submit"])->name('admin.submit');
});

Route::middleware(['admin'])->group (function(){
    Route::get('/admin/dashboard',[AdminController::class, "dashboard"])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class, "logout"])->name('admin.logout');

    Route::get('/admin/guru',[guruController::class, "guru"])->name('admin.guru');
    Route::get('/admin/guru_tambah',[guruController::class, "create"])->name('admin.guru_create');
    Route::post('/admin/guru_tambah',[guruController::class, "store"])->name('admin.guru_store');

    Route::get('/admin/dudi',[AdminController::class, "dudi"])->name('admin.dudi');
    Route::get('/admin/pembimbing',[AdminController::class, "pembimbing"])->name('admin.pembimbing');
});


