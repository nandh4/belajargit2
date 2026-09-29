<?php

namespace App\Http\Controllers;

use App\Models\Tagging;
use Illuminate\Http\Request;

class TaggingController extends Controller
{
    /**
     * Menampilkan seluruh data tagging.
     */
    public function index(Request $request)
    {
        $query = Tagging::query();

        // Filter berdasarkan Kecamatan
        if ($request->filled('kecamatan')) {
            $query->where(
                'level_6_full_code',
                'like',
                $request->kecamatan . '%'
            );
        }

        // Pencarian data
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($query) use ($search) {
                $query->where('assignment_id', 'like', '%' . $search . '%')
                    ->orWhere('nama_usaha_bang', 'like', '%' . $search . '%')
                    ->orWhere('nama_kk', 'like', '%' . $search . '%');
            });
        }

        // Pagination
        $taggings = $query->paginate(20)->withQueryString();

        // Daftar Kecamatan
        $kecamatans = \App\Models\Wilayah::where('tingkat', 'kecamatan')
            ->orderBy('nama_wilayah')
            ->get();

        return view('tagging.index', compact(
            'taggings',
            'kecamatans'
        ));
    }

    /**
     * Menampilkan form untuk menambahkan data tagging.
     */
    public function create()
    {
        return view('tagging.create');
    }

    /**
     * Menyimpan data tagging baru ke database.
     */
    public function store(Request $request)
    {
        // Memeriksa data yang dikirim dari form.
        $validated = $request->validate([
            'assignment_id' => 'required|string|max:255|unique:taggings,assignment_id',
            'assignment_status_alias' => 'nullable|string|max:255',
            'level_6_full_code' => 'nullable|string|max:255',
            'nama_usaha_bang' => 'nullable|string|max:255',
            'nama_kk' => 'nullable|string|max:255',
            'ada_keluarga_label' => 'nullable|string|max:255',
            'ada_bang_usaha_label' => 'nullable|string|max:255',
            'geotag_accuracy' => 'nullable|numeric',
            'geotag_latitude' => 'nullable|numeric',
            'geotag_longitude' => 'nullable|numeric',
        ]);

        // Menyimpan data ke tabel taggings.
        Tagging::create($validated);

        // Kembali ke halaman data tagging.
        return redirect()
            ->route('tagging.index')
            ->with('success', 'Data tagging berhasil ditambahkan.');
    }

    public function edit($id)
{
    $tagging = Tagging::findOrFail($id);

    return view('tagging.edit', compact('tagging'));
}

    public function update(Request $request, $id)
    {
        $tagging = Tagging::findOrFail($id);

        $validated = $request->validate([
            'assignment_id' => 'required|string|max:255|unique:taggings,assignment_id,' . $id,
            'assignment_status_alias' => 'nullable|string|max:255',
            'level_6_full_code' => 'nullable|string|max:255',
            'nama_usaha_bang' => 'nullable|string|max:255',
            'nama_kk' => 'nullable|string|max:255',
            'ada_keluarga_label' => 'nullable|string|max:255',
            'ada_bang_usaha_label' => 'nullable|string|max:255',
            'geotag_accuracy' => 'nullable|numeric',
            'geotag_latitude' => 'nullable|numeric',
            'geotag_longitude' => 'nullable|numeric',
        ]);

        $tagging->update($validated);

        return redirect()
            ->route('tagging.index')
            ->with('success', 'Data tagging berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tagging = Tagging::findOrFail($id);

        $tagging->delete();

        return redirect()
            ->route('tagging.index')
            ->with('success', 'Data tagging berhasil dihapus.');
    }

/**
 * Menampilkan data tagging pada peta.
 */
    public function map(Request $request)
    {
        $query = Tagging::whereNotNull('geotag_latitude')
            ->whereNotNull('geotag_longitude');

        if ($request->filled('kecamatan')) {
            $query->where('level_6_full_code', 'like', $request->kecamatan . '%');
        }

        $taggings = $query->get();

        $kecamatans = \App\Models\Wilayah::where('tingkat', 'kecamatan')
            ->orderBy('nama_wilayah')
            ->get();

        return view('tagging.map', compact('taggings', 'kecamatans'));
    }
}
