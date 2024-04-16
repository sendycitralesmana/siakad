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
        Schema::table('mata_kuliah', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['program_studi_id']);
            $table->dropColumn('program_studi_id');
            $table->dropColumn('semester_wajib');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mata_kuliah', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id')->nullable()->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('program_studi_id')->after('user_id')->nullable()->after('user_id');
            $table->foreign('program_studi_id')->references('id')->on('program_studi')->onDelete('cascade');
            $table->string('semester_wajib')->after('program_studi_id')->nullable();
        });
    }
};
