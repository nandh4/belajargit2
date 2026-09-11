<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;

Route::get('/', function () {
    return redirect()->route('mahasiswa.index');
});

Route::resource('mahasiswa', MahasiswaController::class)
    ->except(['show']);