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
        Schema::create('daftar_pemeriksaan', function (Blueprint $table) {
            $table->id('id_daftar_pemeriksaan');
            $table->string('kode_penunjang', 8);
            $table->string('nama', 255);
            $table->string('keterangan', 1000)->nullable();
            $table->timestamps();

            $table->foreign('kode_penunjang')
                ->references('kode_penunjang')
                ->on('penunjang_medis') 
                ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daftar_pemeriksaan', function (Blueprint $table) {
            $table->dropForeign(['kode_penunjang']);
        });
        Schema::dropIfExists('daftar_pemeriksaan');
    }
};
