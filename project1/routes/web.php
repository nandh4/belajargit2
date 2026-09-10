<?php

use Illuminate\Support\Facades\Route;
use App\Models\Mahasiswa;

Route::get('/', function () {
    $mahasiswa = Mahasiswa::all();

    return view('welcome', compact('mahasiswa'));
});