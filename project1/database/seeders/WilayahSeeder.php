<?php

namespace Database\Seeders;

use App\Models\Wilayah;
use Illuminate\Database\Seeder;

class WilayahSeeder extends Seeder
{
    public function run(): void
    {
        // Kota Palembang
        Wilayah::updateOrCreate(
            ['kode_wilayah' => '1671'],
            [
                'nama_wilayah' => 'Kota Palembang',
                'tingkat' => 'kota',
                'kode_induk' => null,
            ]
        );

        // Kecamatan di Kota Palembang
        $kecamatan = [
            ['kode' => '1671010', 'nama' => 'Ilir Barat II'],
            ['kode' => '1671011', 'nama' => 'Gandus'],
            ['kode' => '1671020', 'nama' => 'Seberang Ulu I'],
            ['kode' => '1671021', 'nama' => 'Kertapati'],
            ['kode' => '1671022', 'nama' => 'Jakabaring'],
            ['kode' => '1671031', 'nama' => 'Plaju'],
            ['kode' => '1671040', 'nama' => 'Ilir Barat I'],
            ['kode' => '1671050', 'nama' => 'Ilir Timur I'],
            ['kode' => '1671051', 'nama' => 'Kemuning'],
            ['kode' => '1671060', 'nama' => 'Ilir Timur II'],
            ['kode' => '1671061', 'nama' => 'Kalidoni'],
            ['kode' => '1671062', 'nama' => 'Sungai Selincah'],
            ['kode' => '1671070', 'nama' => 'Sako'],
            ['kode' => '1671071', 'nama' => 'Sematang Borang'],
            ['kode' => '1671080', 'nama' => 'Sukarami'],
            ['kode' => '1671081', 'nama' => 'Alang-Alang Lebar'],
        ];

        foreach ($kecamatan as $item) {
            Wilayah::updateOrCreate(
                ['kode_wilayah' => $item['kode']],
                [
                    'nama_wilayah' => $item['nama'],
                    'tingkat' => 'kecamatan',
                    'kode_induk' => '1671',
                ]
            );
        }
    }
}