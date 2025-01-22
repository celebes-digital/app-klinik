<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemeriksaan_klinis', function (Blueprint $table) {
            $table->bigInteger('no_kunjungan', unsigned: true)->primary();

            $table->json('pemeriksaan_tanda_vital')->nullable();
            $table->json('pemeriksaan_fisik')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_klinis');
    }
};
