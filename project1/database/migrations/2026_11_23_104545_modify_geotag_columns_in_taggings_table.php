<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('taggings', function (Blueprint $table) {
            $table->decimal('geotag_accuracy', 15, 9)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('taggings', function (Blueprint $table) {
            $table->decimal('geotag_accuracy', 12, 6)->nullable()->change();
        });
    }
};