<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wilayah', function (Blueprint $table) {

            $table->id();

            // Kode wilayah BPS
            $table->string('kode_wilayah')->unique();

            // Nama wilayah
            $table->string('nama_wilayah');

            // Tingkatan wilayah
            // kota = Kabupaten/Kota
            // kecamatan = Kecamatan
            // kelurahan = Kelurahan/Desa
            $table->enum('tingkat', [
                'kota',
                'kecamatan',
                'kelurahan'
            ]);

            // Kode wilayah induk
            $table->string('kode_induk')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wilayah');
    }
};