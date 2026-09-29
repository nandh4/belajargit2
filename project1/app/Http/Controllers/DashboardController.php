<?php

namespace App\Http\Controllers;

use App\Models\Tagging;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Tagging::query();

        if ($request->filled('kecamatan')) {
            $query->where('level_6_full_code', 'like', $request->kecamatan . '%');
        }

        $totalData = (clone $query)->count();

        $totalDenganLokasi = (clone $query)
            ->whereNotNull('geotag_latitude')
            ->whereNotNull('geotag_longitude')
            ->count();

        $totalTanpaLokasi = (clone $query)
            ->where(function ($query) {
                $query->whereNull('geotag_latitude')
                    ->orWhereNull('geotag_longitude');
            })
            ->count();

        $totalApproved = (clone $query)
            ->where('assignment_status_alias', 'APPROVED BY Pengawas')
            ->count();

        $totalSubmitted = (clone $query)
            ->where('assignment_status_alias', 'SUBMITTED BY Pencacah')
            ->count();

        $totalRejected = (clone $query)
            ->where('assignment_status_alias', 'REJECTED BY Pengawas')
            ->count();

        $kecamatans = Wilayah::where('tingkat', 'kecamatan')
            ->orderBy('nama_wilayah')
            ->get();

        return view('dashboard', compact(
            'totalData',
            'totalDenganLokasi',
            'totalTanpaLokasi',
            'totalApproved',
            'totalSubmitted',
            'totalRejected',
            'kecamatans'
        ));
    }
}