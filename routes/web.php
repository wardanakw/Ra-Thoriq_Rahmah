<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'proses'])->name('login.proses');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class,'admin'])
        ->name('admin.dashboard');

    Route::resource('users', UserController::class);

});

/*
|--------------------------------------------------------------------------
| GURU
|--------------------------------------------------------------------------
*/
Route::resource('penilaian', PenilaianController::class);
Route::middleware(['auth','role:guru'])->group(function () {

    Route::get('/guru/dashboard', [DashboardController::class,'guru'])
        ->name('guru.dashboard');

    Route::resource('murid', MuridController::class);

    Route::resource('penilaian', PenilaianController::class);

    Route::get('/laporan',[LaporanController::class,'index'])
        ->name('laporan');

});