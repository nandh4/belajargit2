<?php

namespace App\Http\Controllers;

use App\Models\Tagging;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaggingController extends Controller
{
    /**
     * Mencatat aktivitas data tagging.
     */
    private function recordActivity($tagging, $activity, $description)
    {
        DB::table('tagging_activities')->insert([
            'tagging_id' => $tagging->id,
            'assignment_id' => $tagging->assignment_id,
            'activity' => $activity,
            'description' => $description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Menampilkan seluruh data tagging.
     */
    public function index(Request $request)
    {
        $query = Tagging::query();

        // Waktu aktivitas tagging terakhir secara keseluruhan
        $lastUpdated = DB::table('tagging_activities')
            ->latest('created_at')
            ->value('created_at');

        // Filter kecamatan
        if ($request->filled('kecamatan')) {
            $query->where(
                'level_6_full_code',
                'like',
                $request->kecamatan . '%'
            );
        }

        // Pencarian
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('assignment_id', 'like', '%' . $search . '%')
                    ->orWhere('level_6_full_code', 'like', '%' . $search . '%')
                    ->orWhere('nama_usaha_bang', 'like', '%' . $search . '%')
                    ->orWhere('nama_kk', 'like', '%' . $search . '%');
            });
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where(
                'assignment_status_alias',
                $request->status
            );
        }

        // Filter ketersediaan koordinat
        if ($request->location === 'ada') {
            $query->whereNotNull('geotag_latitude')
                ->whereNotNull('geotag_longitude');
        } elseif ($request->location === 'tidak') {
            $query->where(function ($q) {
                $q->whereNull('geotag_latitude')
                    ->orWhereNull('geotag_longitude');
            });
        }

        $taggings = $query->orderBy('created_at', 'asc')->paginate(20)->withQueryString();

        $kecamatans = Wilayah::where('tingkat', 'kecamatan')
            ->orderBy('nama_wilayah')
            ->get();

        return view('tagging.index', compact(
            'taggings',
            'kecamatans',
            'lastUpdated'
        ));
    }

    /**
 * Mengekspor data tagging ke file CSV.
 */
public function export(Request $request)
{
    $query = Tagging::query();

    // Filter kecamatan
    if ($request->filled('kecamatan')) {
        $query->where(
            'level_6_full_code',
            'like',
            $request->kecamatan . '%'
        );
    }

    // Pencarian
    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('assignment_id', 'like', '%' . $search . '%')
                ->orWhere('level_6_full_code', 'like', '%' . $search . '%')
                ->orWhere('nama_usaha_bang', 'like', '%' . $search . '%')
                ->orWhere('nama_kk', 'like', '%' . $search . '%');
        });
    }

    // Filter status
    if ($request->filled('status')) {
        $query->where(
            'assignment_status_alias',
            $request->status
        );
    }

    // Filter ketersediaan koordinat
    if ($request->location === 'ada') {
        $query->whereNotNull('geotag_latitude')
            ->whereNotNull('geotag_longitude');
    } elseif ($request->location === 'tidak') {
        $query->where(function ($q) {
            $q->whereNull('geotag_latitude')
                ->orWhereNull('geotag_longitude');
        });
    }

    // Nama dan urutan kolom CSV
    $header = [
        'assignment_id',
        'assignment_status_alias',
        'level_6_full_code',
        'nama_usaha_bang',
        'nama_kk',
        'ada_keluarga_label',
        'ada_bang_usaha_label',
        'geotag_accuracy',
        'geotag_latitude',
        'geotag_longitude',
    ];

    // Membuat dan mengunduh file CSV
   // Membuat dan mengunduh file CSV
return response()->streamDownload(function () use ($query, $header) {

    $handle = fopen('php://output', 'w');

    // Menulis header CSV tanpa BOM
    fputcsv($handle, $header);

    // Mengambil seluruh data tanpa pagination
    $taggings = $query->orderBy('created_at', 'asc')->cursor();

    foreach ($taggings as $data) {
        fputcsv($handle, [
            $data->assignment_id,
            $data->assignment_status_alias,
            $data->level_6_full_code,
            $data->nama_usaha_bang,
            $data->nama_kk,
            $data->ada_keluarga_label,
            $data->ada_bang_usaha_label,
            $data->geotag_accuracy,
            $data->geotag_latitude,
            $data->geotag_longitude,
        ]);
    }

    fclose($handle);

}, 'data-tagging-' . now()->format('Ymd_His') . '.csv', [
    'Content-Type' => 'text/csv; charset=UTF-8',
]);
}
    /**
     * Menampilkan form tambah data.
     */
    public function create()
    {
        return view('tagging.create');
    }

    /**
     * Menyimpan data tagging baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'assignment_id' => 'required|string|max:255|unique:taggings,assignment_id',
            'assignment_status_alias' => 'required|string|max:255',
            'level_6_full_code' => 'required|string|max:255',
            'nama_usaha_bang' => 'required|string|max:255',
            'nama_kk' => 'required|string|max:255',
            'ada_keluarga_label' => 'required|string|max:255',
            'ada_bang_usaha_label' => 'required|string|max:255',
            'geotag_accuracy' => 'required|numeric',
            'geotag_latitude' => 'required|numeric',
            'geotag_longitude' => 'required|numeric',
        ]);

        $tagging = Tagging::create($validated);

        // Catat aktivitas penambahan
        $this->recordActivity(
            $tagging,
            'created',
            'Data tagging ditambahkan'
        );

        return redirect()
            ->route('tagging.index')
            ->with('success', 'Data tagging berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit data.
     */
    public function edit($id)
    {
        $tagging = Tagging::findOrFail($id);

        // Waktu pembaruan khusus data yang sedang dibuka
        $recordLastUpdated = $tagging->updated_at ?? $tagging->created_at;

        return view('tagging.edit', compact(
            'tagging',
            'recordLastUpdated'
        ));
    }

    /**
     * Memperbarui data tagging.
     */
    public function update(Request $request, $id)
    {
        $tagging = Tagging::findOrFail($id);

        $validated = $request->validate([
            'assignment_id' => 'required|string|max:255|unique:taggings,assignment_id,' . $id,
            'assignment_status_alias' => 'required|string|max:255',
            'level_6_full_code' => 'required|string|max:255',
            'nama_usaha_bang' => 'required|string|max:255',
            'nama_kk' => 'required|string|max:255',
            'ada_keluarga_label' => 'required|string|max:255',
            'ada_bang_usaha_label' => 'required|string|max:255',
            'geotag_accuracy' => 'required|numeric',
            'geotag_latitude' => 'required|numeric',
            'geotag_longitude' => 'required|numeric',
        ]);

        $tagging->update($validated);

        // Catat aktivitas perubahan
        $this->recordActivity(
            $tagging,
            'updated',
            'Data tagging diperbarui'
        );

        return redirect()
            ->route('tagging.index')
            ->with('success', 'Data tagging berhasil diperbarui.');
    }

    /**
     * Menghapus data tagging.
     */
    public function destroy($id)
    {
        $tagging = Tagging::findOrFail($id);

        // Catat aktivitas sebelum data dihapus
        $this->recordActivity(
            $tagging,
            'deleted',
            'Data tagging dihapus'
        );

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
            $query->where(
                'level_6_full_code',
                'like',
                $request->kecamatan . '%'
            );
        }

        // Pencarian data
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('assignment_id', 'like', '%' . $search . '%')
                    ->orWhere('level_6_full_code', 'like', '%' . $search . '%')
                    ->orWhere('nama_usaha_bang', 'like', '%' . $search . '%')
                    ->orWhere('nama_kk', 'like', '%' . $search . '%');
            });
        }

        $taggings = $query->get();

        $kecamatans = Wilayah::where('tingkat', 'kecamatan')
            ->orderBy('nama_wilayah')
            ->get();

        return view('tagging.map', compact(
            'taggings',
            'kecamatans'
        ));
    }
}
