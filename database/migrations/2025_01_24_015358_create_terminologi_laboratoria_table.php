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
        Schema::create('terminologi_laboratorium', function (Blueprint $table) {
            $table->string('code', 7)->primary();
            $table->string('nama_pemeriksaan', 500);
            $table->string('display', 1000);
            // $table->unsignedBigInteger('id_daftar_pemeriksaan');
            // $table->foreign('id_daftar_pemeriksaan')->references('id_daftar_pemeriksaan')->on('daftar_pemeriksaan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_pasien', function (Blueprint $table) {
            $table->dropForeign(['id_pasien']);
        });
        Schema::dropIfExists('terminologi_laboratorium');
    }
};
