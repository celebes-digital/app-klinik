<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anamnesis', function (Blueprint $table) {
            $table->bigInteger('no_kunjungan', unsigned: true)->primary();
            $table->foreignId('id_pasien')->constrained('pasien', 'id_pasien')->onDelete('cascade');

            $table->text('keluhan_utama');
            $table->text('keluhan_penyerta')->nullable();
            $table->text('riwayat_penyakit_sekarang')->nullable();
            $table->text('riwayat_penyakit_terdahulu')->nullable();
            $table->text('riwayat_penyakit_keluarga')->nullable();
            $table->text('riwayat_alergi')->nullable();
            $table->text('riwayat_pengobatan')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anamnesis');
    }
};
