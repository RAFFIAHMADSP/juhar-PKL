<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\dudiController;
use App\Http\Controllers\admin\guruController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\admin\PembimbingController;
use App\Http\Controllers\admin\SiswaController;
use App\Http\Controllers\Auth\adminLoginController;
use App\Http\Controllers\Auth\GuruLoginController;
use App\Http\Controllers\Auth\siswaLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::middleware(['guest'])->group(function(){
    Route::get('/admin/login',[adminLoginController::class, "login"])->name('admin.login');
    Route::post('/admin/submit',[adminLoginController::class, "submit"])->name('admin.submit');

    Route::get('/guru/login',[GuruLoginController::class, "login"])->name('guru.login');
    Route::post('/guru/submit',[GuruLoginController::class, "submit"])->name('guru.submit');

    Route::get('/siswa/login',[siswaLoginController::class, "login"])->name('siswa.login');
    Route::post('/siswa/submit',[siswaLoginController::class, "submit"])->name('siswa.submit');



});

Route::middleware(['admin'])->group (function(){
    Route::get('/admin/dashboard',[AdminController::class, "dashboard"])->name('admin.dashboard');
    Route::get('/admin/profile',[AdminController::class, "profile"])->name('admin.profile');
    Route::put('/admin/profile_update',[AdminController::class, "update"])->name('admin.profile_update');
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

    Route::get('/admin/pembimbing',[PembimbingController::class, "pembimbing"])->name('admin.pembimbing');
    Route::get('/admin/pembimbing_tambah',[PembimbingController::class, "create"])->name('admin.pembimbing_create');
    Route::post('/admin/pembimbing_tambah',[PembimbingController::class, "store"])->name('admin.pembimbing_store');
    Route::get('/admin/pembimbing_edit/{id}',[PembimbingController::class, "edit"])->name('admin.pembimbing_edit');
    Route::put('/admin/pembimbing_update/{id}',[PembimbingController::class, "update"])->name('admin.pembimbing_update');
    Route::get('/admin/pembimbing_delete/{id}',[PembimbingController::class, "delete"])->name('admin.pembimbing_delete');

    Route::get('/admin/pembimbing/{id}/siswa',[SiswaController::class, "siswa"])->name('admin.pembimbing_siswa');
    Route::get('/admin/pembimbing/{id}/siswa_tambah',[SiswaController::class, "create"])->name('admin.siswa_create');
    Route::post('/admin/pembimbing/{id}/siswa_tambah',[SiswaController::class, "store"])->name('admin.siswa_store');
    Route::get('/admin/pembimbing/{id}/siswa_edit/{id_siswa}',[SiswaController::class, "edit"])->name('admin.siswa_edit');
    Route::put('/admin/pembimbing/{id}/siswa_update/{id_siswa}',[SiswaController::class, "update"])->name('admin.siswa_update');
    Route::get('/admin/pembimbing/{id}/siswa_delete/{id_siswa}',[SiswaController::class, "delete"])->name('admin.siswa_delete');


});

Route::middleware(['guru'])->group (function(){
    Route::get('/guru/dashboard',[guruController::class, "dashboard"])->name('guru.dashboard');
    Route::get('/guru/pembimbing',[PembimbingController::class, "pembimbingGuru"])->name('guru.pembimbing');
    Route::get('/guru/logout',[guruController::class, "logoutGuru"])->name('guru.logout');
    Route::get('/guru/pembimbing/{id}/siswa',[SiswaController::class, "siswaGuru"])->name('guru.pembimbing.siswa');
    Route::get('/guru/pembimbing/{id}/siswa/{id_siswa}/kegiatan',[KegiatanController::class, "kegiatan"])->name('guru.pembimbing.siswa.kegiatan');
    Route::get('/guru/pembimbing/{id}/siswa/{id_siswa}/kegiatan_detail{id_kegiatan}',[KegiatanController::class, "detailKegiatan"])->name('guru.pembimbing.siswa.kegiatan_detail');
    Route::get('/guru/profile',[guruController::class, "profileGuru"])->name('guru.profile');
    Route::put('/guru/profile_update',[guruController::class, "updateGuru"])->name('guru.profile_update');


});

Route::middleware(['siswa'])->group (function(){
    Route::get('/siswa/dashboard',[SiswaController::class, "dashboard"])->name('siswa.dashboard');
    Route::get('/siswa/logout',[SiswaController::class, "logoutSiswa"])->name('siswa.logout');
    Route::get('/siswa/profile',[SiswaController::class, "profileSiswa"])->name('siswa.profile');
    Route::put('/siswa/profile_update',[SiswaController::class, "updateSiswa"])->name('siswa.profile_update');
    Route::get('/siswa/kegiatan',[KegiatanController::class, "kegiatanSiswa"])->name('siswa.kegiatan');


});
