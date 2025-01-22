<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('poliklinik', function (Blueprint $table) {
            $table->tinyInteger('id_poli', true, true)->primary();

            $table->char('nama_poli', 50);
            $table->unsignedInteger('tarif_dasar')->default(0);
            $table->unsignedInteger('tarif_konsultasi')->default(0);
            $table->text('alamat', 100)->nullable();
            $table->char('email', 50)->nullable();
            $table->char('no_telp', 16)->nullable();
            $table->char('provinsi', 2)->nullable();
            $table->char('kabupaten', 4)->nullable();
            $table->char('kecamatan', 7)->nullable();
            $table->char('kelurahan', 10)->nullable();
            $table->char('kode_pos', 6)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('poliklinik');
    }
};
