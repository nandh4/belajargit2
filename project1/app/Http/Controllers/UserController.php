<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Mencatat aktivitas data user.
     */
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
     * Menampilkan seluruh data user.
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Waktu aktivitas terakhir
        $lastUpdated = DB::table('user_activities')
            ->latest('created_at')
            ->value('created_at');

        // Filter berdasarkan role
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // Pencarian nama atau username
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('username', 'like', '%' . $search . '%');
            });
        }

        // Daftar user dengan pagination
        $users = $query->orderBy('created_at', 'asc')
            ->paginate(20)
            ->withQueryString();

        // Mengambil pilihan role yang tersedia
        $roles = User::select('role')
            ->distinct()
            ->orderBy('role')
            ->pluck('role');

        return view('user.index', compact(
            'users',
            'roles',
            'lastUpdated'
        ));
    }

    /**
     * Menampilkan form tambah user.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Menyimpan user baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required',
                'string',
                'max:255',
                'unique:users,username'
            ],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', Rule::in(['admin', 'operator'])],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role yang dipilih tidak valid.',
        ]);

        // Mengamankan password dengan hash
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        // Mencatat aktivitas penambahan user
        $this->recordActivity(
            $user,
            'created',
            'Data user ditambahkan'
        );

        return redirect()
            ->route('user.index')
            ->with('success', 'Data user berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $recordLastUpdated = $user->updated_at ?? $user->created_at;

        return view('user.edit', compact(
            'user',
            'recordLastUpdated'
        ));
    }

    /**
     * Memperbarui data user.
     */
    
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . $user->id,
        'password' => 'nullable|string|min:8',
        'role' => 'required|in:admin,operator',
    ]);

    // Password hanya diperbarui jika kolom diisi.
    if (!empty($validated['password'])) {
        $validated['password'] = Hash::make($validated['password']);
    } else {
        unset($validated['password']);
    }

    $user->update($validated);

    $this->recordActivity(
        $user,
        'updated',
        'Data user diperbarui'
    );

    return redirect()
        ->route('user.index')
        ->with('success', 'Data user berhasil diperbarui.');
}


    /**
     * Menghapus user.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Mencegah admin menghapus akun sendiri
        if (auth()->id() === $user->id) {
            return redirect()
                ->route('user.index')
                ->with('error', 'Kamu tidak dapat menghapus akun sendiri.');
        }

        // Catat aktivitas sebelum user dihapus
        $this->recordActivity(
            $user,
            'deleted',
            'Data user dihapus'
        );

        $user->delete();

        return redirect()
            ->route('user.index')
            ->with('success', 'Data user berhasil dihapus.');
    }

    /**
 * Menampilkan form reset password user.
 */
public function resetPasswordForm($id)
{
    $user = User::findOrFail($id);

    $recordLastUpdated = $user->updated_at ?? $user->created_at;

    return view('user.reset-pw', compact('user', 'recordLastUpdated'));
}

/**
 * Memproses reset password user.
 */
public function resetPassword(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ], [
        'password.required' => 'Password baru wajib diisi.',
        'password.min' => 'Password minimal 8 karakter.',
        'password.confirmed' => 'Konfirmasi password tidak sesuai.',
    ]);

    // Mengamankan password baru dengan hash.
    $user->password = Hash::make($validated['password']);
    $user->save();

    // Mencatat aktivitas reset password.
    $this->recordActivity(
        $user,
        'password_reset',
        'Password akun direset oleh admin'
    );

    return redirect()
        ->route('user.index')
        ->with('success', 'Password akun ' . $user->name . ' berhasil direset.');
}
}
