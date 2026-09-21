<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\TaggingController;
use App\Http\Controllers\TaggingImportController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\RoleMiddleware;

/*
Route::get('/', function () {
    return redirect()->route('mahasiswa.index');
});

Route::resource('mahasiswa', MahasiswaController::class)
    ->except(['show']);
*/

Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware(['auth', 'role:admin,operator']);

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/tagging/map', [TaggingController::class, 'map'])
    ->name('tagging.map')
    ->middleware(['auth', 'role:admin,operator']);

Route::resource('tagging', TaggingController::class)
    ->only(['index'])
    ->middleware(['auth', 'role:admin,operator']);

Route::resource('tagging', TaggingController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'role:admin']);

Route::get('/tagging/import', [TaggingImportController::class, 'index'])
    ->name('tagging.import')
    ->middleware(['auth', 'role:admin,operator']);

Route::post('/tagging/import', [TaggingImportController::class, 'import'])
    ->name('tagging.import.process')
    ->middleware(['auth', 'role:admin,operator']);