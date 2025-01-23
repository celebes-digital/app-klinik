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
        Schema::create('poliklinik_tenaga_medis', function (Blueprint $table) {
            $table->unsignedBigInteger('id_tenaga_medis');
            $table->unsignedTinyInteger('id_poliklinik');

            $table->foreign('id_tenaga_medis')->references('id_tenaga_medis')->on('tenaga_medis')->onDelete('cascade');
            $table->foreign('id_poliklinik')->references('id_poli')->on('poliklinik')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('poliklinik_tenaga_medis', function (Blueprint $table) {
            $table->dropForeign(['id_tenaga_medis']);
            $table->dropForeign(['id_poliklinik']);
        });

        Schema::dropIfExists('poliklinik_tenaga_medis_pivot');
    }
};
