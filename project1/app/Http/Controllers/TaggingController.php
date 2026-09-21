<?php

namespace App\Http\Controllers;

use App\Models\Tagging;
use Illuminate\Http\Request;

class TaggingController extends Controller
{
    /**
     * Menampilkan seluruh data tagging.
     */
    public function index()
    {
        $taggings = Tagging::paginate(20);

        return view('tagging.index', compact('taggings'));
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
public function map()
{
    $taggings = Tagging::whereNotNull('geotag_latitude')
        ->whereNotNull('geotag_longitude')
        ->get();

    return view('tagging.map', compact('taggings'));
}
}
