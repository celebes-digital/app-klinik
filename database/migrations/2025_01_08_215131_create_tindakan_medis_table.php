<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tindakan_medis', function (Blueprint $table) {
            $table->string('kode_tindakan')->primary();
            $table->string('nama_tindakan');
            $table->unsignedInteger('harga_satuan')->default(0);
            $table->unsignedInteger('harga_dasar')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tindakan_medis');
    }
};
