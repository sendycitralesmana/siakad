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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('fakultas_id')->after('password')->nullable();
            $table->foreign('fakultas_id')->references('id')->on('fakultas')->onDelete('cascade');
            $table->unsignedBigInteger('jurusan_id')->after('fakultas_id')->nullable();
            $table->foreign('jurusan_id')->references('id')->on('jurusan')->onDelete('cascade');
            $table->unsignedBigInteger('program_studi_id')->after('jurusan_id')->nullable();
            $table->foreign('program_studi_id')->references('id')->on('program_studi')->onDelete('cascade');
            $table->unsignedBigInteger('tahun_akademik_id')->after('program_studi_id')->nullable();
            $table->foreign('tahun_akademik_id')->references('id')->on('tahun_akademik')->onDelete('cascade');
            $table->string('semester')->after('tahun_akademik_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['fakultas_id']);
            $table->dropColumn('fakultas_id');
            $table->dropForeign(['jurusan_id']);
            $table->dropColumn('jurusan_id');
            $table->dropForeign(['program_studi_id']);
            $table->dropColumn('program_studi_id');
            $table->dropForeign(['tahun_akademik_id']);
            $table->dropColumn('tahun_akademik_id');
            $table->dropColumn('semester');
        });
    }
};
