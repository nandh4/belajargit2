<?php

namespace App\Http\Controllers;

use App\Models\Tagging;
use App\Models\Wilayah;

class DashboardController extends Controller
{
    public function index()
    {
        // =====================================================
        // STATISTIK UTAMA
        // =====================================================

        $totalData = Tagging::count();

        $withLocation = Tagging::whereNotNull('geotag_latitude')
            ->whereNotNull('geotag_longitude')
            ->count();

        $withoutLocation = $totalData - $withLocation;

        $approved = Tagging::where(
            'assignment_status_alias',
            'APPROVED BY Pengawas'
        )->count();

        $submitted = Tagging::where(
            'assignment_status_alias',
            'SUBMITTED BY Pencacah'
        )->count();

        $rejected = Tagging::where(
            'assignment_status_alias',
            'REJECTED BY Pengawas'
        )->count();


        // =====================================================
        // PERSENTASE
        // =====================================================

        $locationPercent = $totalData > 0
            ? round(($withLocation / $totalData) * 100, 1)
            : 0;

        $approvedPercent = $totalData > 0
            ? round(($approved / $totalData) * 100, 1)
            : 0;

        $submittedPercent = $totalData > 0
            ? round(($submitted / $totalData) * 100, 1)
            : 0;

        $rejectedPercent = $totalData > 0
            ? round(($rejected / $totalData) * 100, 1)
            : 0;


        // =====================================================
        // DATA PER KECAMATAN
        // =====================================================

        $kecamatans = Wilayah::where(
            'tingkat',
            'kecamatan'
        )
        ->orderBy('nama_wilayah')
        ->get();

        $dataPerKecamatan = [];

        foreach ($kecamatans as $kecamatan) {

            $jumlah = Tagging::where(
                'level_6_full_code',
                'like',
                $kecamatan->kode_wilayah . '%'
            )->count();

            $dataPerKecamatan[] = [
                'kode' => $kecamatan->kode_wilayah,
                'nama' => $kecamatan->nama_wilayah,
                'jumlah' => $jumlah,
            ];
        }


        // =====================================================
        // URUTKAN DATA KECAMATAN
        // =====================================================

        usort(
            $dataPerKecamatan,
            function ($a, $b) {
                return $b['jumlah'] <=> $a['jumlah'];
            }
        );


        // =====================================================
        // DATA UNTUK MINI MAP
        // =====================================================

        $mapData = Tagging::whereNotNull('geotag_latitude')
            ->whereNotNull('geotag_longitude')
            ->get([
                'id',
                'assignment_id',
                'assignment_status_alias',
                'level_6_full_code',
                'nama_usaha_bang',
                'nama_kk',
                'geotag_accuracy',
                'geotag_latitude',
                'geotag_longitude',
            ]);


        // =====================================================
        // DATA TERAKHIR DIPERBARUI
        // =====================================================

        $lastUpdated = Tagging::latest('updated_at')
            ->value('updated_at');


        // =====================================================
        // KIRIM SEMUA DATA KE DASHBOARD
        // =====================================================

        return view('dashboard', compact(

            'totalData',
            'withLocation',
            'withoutLocation',

            'approved',
            'submitted',
            'rejected',

            'locationPercent',

            'approvedPercent',
            'submittedPercent',
            'rejectedPercent',

            'dataPerKecamatan',

            'mapData',

            'lastUpdated'

        ));
    }
}