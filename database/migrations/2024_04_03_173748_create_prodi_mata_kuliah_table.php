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
        Schema::create('prodi_mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dosen_mata_kuliah_id');
            $table->foreign('dosen_mata_kuliah_id')->references('id')->on('dosen_mata_kuliah')->onDelete('cascade');
            $table->unsignedBigInteger('program_studi_id')->nullable();
            $table->foreign('program_studi_id')->references('id')->on('program_studi')->onDelete('cascade');
            $table->integer('semester_wajib')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodi_mata_kuliah');
    }
};
