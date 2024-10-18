<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\dudiController;
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
    Route::get('/admin/guru_edit/{id}',[guruController::class, "edit"])->name('admin.guru_edit');
    Route::put('/admin/guru_update/{id}',[guruController::class, "update"])->name('admin.guru_update');
    Route::get('/admin/guru_delete/{id}',[guruController::class, "delete"])->name('admin.guru_delete');

    Route::get('/admin/dudi',[dudiController::class, "dudi"])->name('admin.dudi');
    Route::get('/admin/dudi_tambah',[dudiController::class, "create"])->name('admin.dudi_create');
    Route::post('/admin/dudi_tambah',[dudiController::class, "store"])->name('admin.dudi_store');
    Route::get('/admin/dudi_edit/{id}',[dudiController::class, "edit"])->name('admin.dudi_edit');
    Route::put('/admin/dudi_update/{id}',[dudiController::class, "update"])->name('admin.dudi_update');
    Route::get('/admin/dudi_delete/{id}',[dudiController::class, "delete"])->name('admin.dudi_delete');

    Route::get('/admin/pembimbing',[AdminController::class, "pembimbing"])->name('admin.pembimbing');
});


