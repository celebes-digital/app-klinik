<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penunjang_medis', function (Blueprint $table) {
            $table->string('kode_penunjang', 8)->primary();
            $table->string('nama_penunjang', 50);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penunjang_medis');
    }
};
