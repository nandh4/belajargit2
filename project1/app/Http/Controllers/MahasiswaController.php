<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Menampilkan semua data mahasiswa
    public function index()
    {
        $mahasiswa = Mahasiswa::all();

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    // Menampilkan form tambah mahasiswa
    public function create()
    {
        return view('mahasiswa.create');
    }

    // Menyimpan mahasiswa baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email'
        ]);

        Mahasiswa::create([
            'nama' => $request->nama,
            'email' => $request->email
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // Mengubah data mahasiswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->update([
            'nama' => $request->nama,
            'email' => $request->email
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diubah.');
    }

    // Menghapus mahasiswa
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}