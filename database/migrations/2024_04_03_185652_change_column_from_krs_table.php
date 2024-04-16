<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('krs', function (Blueprint $table) {
            $table->dropForeign(['mata_kuliah_id']);
            $table->dropColumn('mata_kuliah_id');
            $table->unsignedBigInteger('prodi_mata_kuliah_id')->nullable()->after('dosen_id');
            $table->foreign('prodi_mata_kuliah_id')->references('id')->on('prodi_mata_kuliah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('krs', function (Blueprint $table) {
            $table->dropForeign(['prodi_mata_kuliah_id']);
            $table->dropColumn('prodi_mata_kuliah_id');
            $table->unsignedBigInteger('mata_kuliah_id')->nullable();
            $table->foreign('mata_kuliah_id')->references('id')->on('mata_kuliah');
        });
    }
};
