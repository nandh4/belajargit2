<?php

namespace App\Http\Controllers;

use App\Models\Tagging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaggingImportController extends Controller
{
    /**
     * Mencatat aktivitas import data tagging.
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
     * Menampilkan halaman import CSV.
     */
    public function index()
    {
        return view('tagging.import');
    }

    /**
     * Mengganti seluruh data tagging berdasarkan CSV terbaru.
     */
    public function import(Request $request)
    {
        // Validasi file CSV.
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:10240',
        ]);

        $file = $request->file('file');

        // Membuka file CSV.
        $handle = fopen($file->getRealPath(), 'r');

        if ($handle === false) {
            return back()->withErrors([
                'file' => 'File CSV tidak dapat dibuka.',
            ]);
        }

       // Membaca header dan melewati baris kosong di awal file
$header = false;

while (($baris = fgetcsv($handle)) !== false) {
    if (count($baris) === 1 && trim($baris[0]) === '') {
        continue;
    }

    $header = $baris;
    break;
}

        if ($header === false) {
            fclose($handle);

            return back()->withErrors([
                'file' => 'File CSV kosong atau tidak memiliki header.',
            ]);
        }

        // Menghapus BOM dan spasi pada header.
        $header = array_map(function ($column) {
            $column = preg_replace('/^\xEF\xBB\xBF/', '', $column);

            return trim($column);
        }, $header);

        // Header CSV yang diharapkan.
        $headerYangDiharapkan = [
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

        // Memeriksa kesesuaian header.
        
        if ($header !== $headerYangDiharapkan) {
            fclose($handle);

            return back()->withErrors([
                'file' => 'Format kolom CSV tidak sesuai dengan format data tagging.',
            ]);
        }

        // Menampung seluruh data CSV sebelum disimpan.
        $dataImport = [];

        $assignmentIds = [];

        $nomorBaris = 1;

        while (($row = fgetcsv($handle)) !== false) {

            $nomorBaris++;

            // Melewati baris yang benar-benar kosong.
            if (count($row) === 1 && trim($row[0] ?? '') === '') {
                continue;
            }

            // Memastikan setiap baris memiliki 10 kolom.
            if (count($row) !== 10) {
                fclose($handle);

                return back()->withErrors([
                    'file' => "Jumlah kolom pada baris $nomorBaris tidak sesuai. Harus 10 kolom.",
                ]);
            }

            $assignmentId = trim($row[0]);

            // Assignment ID wajib diisi.
            if ($assignmentId === '') {
                fclose($handle);

                return back()->withErrors([
                    'file' => "Assignment ID pada baris $nomorBaris tidak boleh kosong.",
                ]);
            }

            // Memeriksa duplikasi Assignment ID dalam CSV.
            if (in_array($assignmentId, $assignmentIds, true)) {
                fclose($handle);

                return back()->withErrors([
                    'file' => "Assignment ID duplikat ditemukan pada baris $nomorBaris.",
                ]);
            }

            $assignmentIds[] = $assignmentId;

            // Menyiapkan data dari CSV.
            $data = [
                'assignment_id' => $assignmentId,
                'assignment_status_alias' => trim($row[1]) ?: null,
                'level_6_full_code' => trim($row[2]) ?: null,
                'nama_usaha_bang' => trim($row[3]) ?: null,
                'nama_kk' => trim($row[4]) ?: null,
                'ada_keluarga_label' => trim($row[5]) ?: null,
                'ada_bang_usaha_label' => trim($row[6]) ?: null,
                'geotag_accuracy' => trim($row[7]) ?: null,
                'geotag_latitude' => trim($row[8]) ?: null,
                'geotag_longitude' => trim($row[9]) ?: null,
            ];

            // Memeriksa nilai numerik geotag.
            $kolomNumerik = [
                'geotag_accuracy',
                'geotag_latitude',
                'geotag_longitude',
            ];

            foreach ($kolomNumerik as $kolom) {
                if (
                    $data[$kolom] !== null &&
                    !is_numeric($data[$kolom])
                ) {
                    fclose($handle);

                    return back()->withErrors([
                        'file' => "Nilai $kolom tidak valid pada baris $nomorBaris.",
                    ]);
                }
            }

            $dataImport[] = $data;
        }

        // Menutup file CSV.
        fclose($handle);

        // Mencegah data lama terhapus jika CSV hanya berisi header.
        if (count($dataImport) === 0) {
            return back()->withErrors([
                'file' => 'CSV tidak memiliki data untuk diimport.',
            ]);
        }

        // Menghitung jumlah data lama.
        $jumlahLama = Tagging::count();

        // Mengganti seluruh data dalam satu transaksi.
        DB::transaction(function () use ($dataImport) {

            // Menghapus seluruh data tagging lama.
            // Riwayat aktivitas tetap tersimpan karena nullOnDelete().
            DB::table('taggings')->delete();

            // Memasukkan seluruh data dari CSV terbaru.
            foreach ($dataImport as $data) {

                $tagging = Tagging::create($data);

                // Mencatat aktivitas penambahan data melalui import.
                $this->recordActivity(
                    $tagging,
                    'created',
                    'Data tagging ditambahkan melalui import CSV'
                );
            }
        });

        // Menghitung jumlah data setelah import.
        $jumlahBaru = count($dataImport);

        // Kembali ke halaman import dengan pesan berhasil.
        return redirect()
            ->route('tagging.import')
            ->with(
                'success',
                "Import berhasil. Seluruh data lama ($jumlahLama data) telah diganti dengan $jumlahBaru data terbaru."
            );
    }
}
