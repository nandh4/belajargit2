<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Membuat tabel taggings.
     */
    public function up(): void
    {
        Schema::create('taggings', function (Blueprint $table) {

            // ID otomatis dari database
            $table->id();

            // ID assignment dari data CSV
            $table->string('assignment_id')->unique();

            // Status assignment
            $table->string('assignment_status_alias')->nullable();

            // Kode wilayah level 6
            $table->string('level_6_full_code')->nullable();

            // Nama usaha
            $table->string('nama_usaha_bang')->nullable();

            // Nama kepala keluarga
            $table->string('nama_kk')->nullable();

            // Status ada keluarga
            $table->string('ada_keluarga_label')->nullable();

            // Status ada bangunan usaha
            $table->string('ada_bang_usaha_label')->nullable();

            // Akurasi geotag
            $table->decimal('geotag_accuracy', 12, 6)->nullable();

            // Latitude
            $table->decimal('geotag_latitude', 12, 8)->nullable();

            // Longitude
            $table->decimal('geotag_longitude', 12, 8)->nullable();

            // Waktu dibuat dan diperbarui
            $table->timestamps();
        });
    }

    /**
     * Menghapus tabel taggings.
     */
    public function down(): void
    {
        Schema::dropIfExists('taggings');
    }
};