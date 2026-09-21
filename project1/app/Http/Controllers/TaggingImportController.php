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

        // Membaca baris pertama sebagai header.
        $header = fgetcsv($handle);

        // Menghitung jumlah data yang berhasil dimasukkan.
        $jumlahData = 0;

        // Membaca CSV baris demi baris.
        while (($row = fgetcsv($handle)) !== false) {

            // Menghindari baris kosong.
            if (count($row) < 10) {
                continue;
            }

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

            $jumlahData++;
        }

        // Menutup file.
        fclose($handle);

        // Kembali ke halaman import dengan pesan berhasil.
        return redirect()
            ->route('tagging.import')
            ->with('success', "$jumlahData data tagging berhasil diimport.");
    }
}