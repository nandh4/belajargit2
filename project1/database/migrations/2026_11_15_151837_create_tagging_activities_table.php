
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tagging_activities', function (Blueprint $table) {
            $table->id();

            // ID tagging yang mengalami aktivitas
            $table->unsignedBigInteger('tagging_id')->nullable();

            // Assignment ID tetap disimpan meskipun data dihapus
            $table->string('assignment_id')->nullable();

            // Jenis aktivitas: created, updated, deleted
            $table->string('activity');

            // Keterangan aktivitas
            $table->string('description');

            // Waktu aktivitas
            $table->timestamps();

            $table->foreign('tagging_id')
                ->references('id')
                ->on('taggings')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tagging_activities');
    }
};
