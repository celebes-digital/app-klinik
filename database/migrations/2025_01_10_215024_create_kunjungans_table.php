<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->bigInteger('no_kunjungan', unsigned: true)->primary();

            $table->uuid('id_kunjungan');
            $table->unsignedTinyInteger('id_poli')->nullable();
            $table->text('keluhan_awal');
            $table->dateTime('tgl_kunjungan');
            $table->enum('status', ['menunggu', 'diperiksa', 'selesai', 'batal'])->default('menunggu');

            $table->foreignId('id_pasien')
                ->constrained('pasien', 'id_pasien')
                ->onDelete('cascade');
            $table->foreignId('id_tenaga_medis')
                ->constrained('tenaga_medis', 'id_tenaga_medis')
                ->onDelete('cascade');
            $table->foreign('id_poli')
                ->references('id_poli')
                ->on('poliklinik')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kunjungan');
    }
};
