
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaggingController;
use App\Http\Controllers\TaggingImportController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;

// ==========================================
// LOGIN DAN LOGOUT
// ==========================================

Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

// HALAMAN UTAMA
Route::get('/', function () {
    return redirect()->route('login');
});

// ==========================================
// HALAMAN ADMIN DAN OPERATOR
// ==========================================

Route::middleware(['auth', 'role:admin,operator'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // PENGATURAN AKUN
    Route::get('/user/settings', [AccountController::class, 'settings'])
        ->name('user.settings');

    Route::put('/user/settings', [AccountController::class, 'update'])
        ->name('user.settings.update');

    // DATA TAGGING
    Route::get('/tagging', [TaggingController::class, 'index'])
        ->name('tagging.index');

    // PETA TAGGING
    Route::get('/tagging/map', [TaggingController::class, 'map'])
        ->name('tagging.map');

    // EXPORT DATA
    Route::get('/tagging/export', [TaggingController::class, 'export'])
        ->name('tagging.export');
});

// ==========================================
// KHUSUS ADMIN
// ==========================================

Route::middleware(['auth', 'role:admin'])->group(function () {

    // TAMBAH DATA TAGGING
    Route::get('/tagging/create', [TaggingController::class, 'create'])
        ->name('tagging.create');

    Route::post('/tagging', [TaggingController::class, 'store'])
        ->name('tagging.store');

    // EDIT DATA TAGGING
    Route::get('/tagging/{tagging}/edit', [TaggingController::class, 'edit'])
        ->name('tagging.edit');

    Route::put('/tagging/{tagging}', [TaggingController::class, 'update'])
        ->name('tagging.update');

    Route::patch('/tagging/{tagging}', [TaggingController::class, 'update']);

    // HAPUS DATA TAGGING
    Route::delete('/tagging/{tagging}', [TaggingController::class, 'destroy'])
        ->name('tagging.destroy');

    // IMPORT DATA TAGGING
    Route::get('/tagging/import', [TaggingImportController::class, 'index'])
        ->name('tagging.import');

    Route::post('/tagging/import', [TaggingImportController::class, 'import'])
        ->name('tagging.import.process');

    // MANAJEMEN USER
    Route::resource('user', UserController::class)
        ->except(['show']);

    // RESET PASSWORD USER
    Route::get('/user/{id}/reset-pw', [UserController::class, 'resetPasswordForm'])
        ->name('user.reset-pw');

    Route::post('/user/{id}/reset-pw', [UserController::class, 'resetPassword'])
        ->name('user.reset-pw.process');
});
