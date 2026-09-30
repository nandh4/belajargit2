<?php

namespace App\Http\Controllers;

use App\Models\Tagging;
use Illuminate\Http\Request;

class TaggingImportController extends Controller
{
    /**
     * Menampilkan halaman import CSV.
     */
    public function index()
    {
        return view('tagging.import');
    }

    /**
     * Memproses file CSV yang diupload.
     */
    public function import(Request $request)
    {
        // Memastikan file yang diupload adalah file CSV.
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:10240',
        ]);

        // Mengambil file yang diupload.
        $file = $request->file('file');

        // Membuka file CSV.
        $handle = fopen($file->getRealPath(), 'r');

        if ($handle === false) {
            return back()
                ->withErrors([
                    'file' => 'File CSV tidak dapat dibuka.',
                ]);
        }

        // Membaca baris pertama sebagai header.
        $header = fgetcsv($handle);

        if ($header === false) {
            fclose($handle);

            return back()
                ->withErrors([
                    'file' => 'File CSV kosong atau tidak memiliki header.',
                ]);
        }

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

        // Memeriksa apakah header CSV sesuai.
        if ($header !== $headerYangDiharapkan) {
            fclose($handle);

            return back()
                ->withErrors([
                    'file' => 'Format kolom CSV tidak sesuai dengan format data tagging.',
                ]);
        }

        // Menghitung jumlah data baru dan data yang diperbarui.
            $jumlahBaru = 0;
            $jumlahDiperbarui = 0;

        // Membaca CSV baris demi baris.
        while (($row = fgetcsv($handle)) !== false) {

            // Menghindari baris kosong.
            if (count($row) < 10 || empty(trim($row[0]))) {
                continue;
            }

            $existing = Tagging::where(
                'assignment_id',
                trim($row[0])
            )->exists();

            // Memasukkan data CSV ke tabel taggings.
            Tagging::updateOrCreate(
                [
                    'assignment_id' => trim($row[0]),
                ],
                [
                    'assignment_status_alias' => trim($row[1]) ?: null,
                    'level_6_full_code' => trim($row[2]) ?: null,
                    'nama_usaha_bang' => trim($row[3]) ?: null,
                    'nama_kk' => trim($row[4]) ?: null,
                    'ada_keluarga_label' => trim($row[5]) ?: null,
                    'ada_bang_usaha_label' => trim($row[6]) ?: null,
                    'geotag_accuracy' => trim($row[7]) ?: null,
                    'geotag_latitude' => trim($row[8]) ?: null,
                    'geotag_longitude' => trim($row[9]) ?: null,
                ]
            );

            if ($existing) {
                $jumlahDiperbarui++;
            } else {
                $jumlahBaru++;
            }
        }

        // Menutup file.
        fclose($handle);

        // Kembali ke halaman import dengan pesan berhasil.
        return redirect()
            ->route('tagging.import')
            ->with(
            'success',
            "Import berhasil. Data baru: $jumlahBaru | Data diperbarui: $jumlahDiperbarui"
        );
    }
}