<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tindakan_medis_pasien', function (Blueprint $table) {
            $table->bigInteger('no_kunjungan', unsigned: true)->primary();
            $table->json('tindakan')->nullable();
            $table->bigInteger('total_harga', unsigned: true)->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tindakan_medis_pasien');
    }
};
