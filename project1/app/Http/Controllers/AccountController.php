<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{

 private function recordActivity($user, $activity, $description)
    {
        DB::table('user_activities')->insert([
            'user_id' => $user->id,
            'activity' => $activity,
            'description' => $description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Menampilkan halaman pengaturan akun.
     */
    public function settings()
    {
        $user = auth()->user();
        $recordLastUpdated = $user->updated_at ?? $user->created_at;

        return view('user.settings', compact('user', 'recordLastUpdated'));
    }

    /**
     * Memperbarui pengaturan akun pengguna yang sedang login.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($user->id),
            ],

            'current_password' => [
                'required_with:password',
                'nullable',
                'string',
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],

        ], [
            'name.required' => 'Nama lengkap wajib diisi.',

            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',

            'current_password.required_with' => 'Password lama wajib diisi jika ingin mengganti password.',

            'password.min' => 'Password baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password baru tidak sesuai.',
        ]);

        // Memeriksa password lama jika pengguna ingin mengganti password.
        if (!empty($validated['password'])) {

            if (!Hash::check($request->current_password, $user->password)) {
                return back()
                    ->withErrors([
                        'current_password' => 'Password lama tidak sesuai.',
                    ])
                    ->withInput();
            }

            // Mengamankan password baru dengan hash.
            $user->password = Hash::make($validated['password']);
        }

        // Memperbarui nama dan username.
        $user->name = $validated['name'];
        $user->username = $validated['username'];

        $user->save();

        $this->recordActivity(
        $user,
        'updated',
        'Pengaturan akun diperbarui'
    );

        return redirect()
            ->route('user.settings.update')
            ->with('success', 'Pengaturan akun berhasil diperbarui.');
    }
}
