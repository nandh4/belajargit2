<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    // Menampilkan halaman pengaturan akun
    public function settings()
    {
        // Mengambil data user yang sedang login
        $user = auth()->user();

        return view('account.settings', compact('user'));
    }

    // Menyimpan perubahan akun
    public function update(Request $request)
    {
        // Mengambil user yang sedang login
        $user = auth()->user();

        // Validasi data nama dan username
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,

            // Password lama hanya wajib jika ingin mengganti password
            'current_password' => 'nullable|string',

            // Password baru minimal 8 karakter
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username tersebut sudah digunakan.',

            'password.min' => 'Password baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Memperbarui nama
        $user->name = $request->name;

        // Memperbarui username
        $user->username = $request->username;

        /*
        |--------------------------------------------------------------------------
        | Mengubah Password
        |--------------------------------------------------------------------------
        */

        // Jika password baru diisi
        if ($request->filled('password')) {

            // Password lama wajib diisi
            if (!$request->filled('current_password')) {
                return back()
                    ->withErrors([
                        'current_password' => 'Password saat ini wajib diisi.'
                    ])
                    ->withInput();
            }

            // Memeriksa apakah password lama benar
            if (!Hash::check($request->current_password, $user->password)) {
                return back()
                    ->withErrors([
                        'current_password' => 'Password saat ini tidak sesuai.'
                    ])
                    ->withInput();
            }

            // Mengenkripsi password baru
            $user->password = Hash::make($request->password);
        }

        // Menyimpan perubahan
        $user->save();

        // Kembali ke halaman pengaturan
        return redirect()
            ->route('account.settings')
            ->with('success', 'Pengaturan akun berhasil diperbarui.');
    }
}