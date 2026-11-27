<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_activities', function (Blueprint $table) {
            $table->id();

            // User yang mengalami aktivitas
            $table->unsignedBigInteger('user_id')->nullable();

            // Jenis aktivitas: created, updated, deleted
            $table->string('activity');

            // Keterangan aktivitas
            $table->string('description');

            // Waktu aktivitas
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_activities');
    }
};
