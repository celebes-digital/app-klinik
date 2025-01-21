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
        Schema::create('kamar_perawatan', function (Blueprint $table) {
            $table->id('id_kamar_perawatan');
            $table->unsignedBigInteger('id_ruang_perawatan');
            $table->char('nama', 100); // nama lokasi
            $table->char('status', 50)->nullable(); // status lokasi occupied unocuppied housekeeping dll
            $table->char('service_class', 50)->nullable(); // mode ruangan or kamar 
            $table->char('jumlah_kasur', 20)->nullable(); // site building dll
            $table->timestamps();

            $table->foreign('id_ruang_perawatan')->references('id_ruang_perawatan')->on('ruang_perawatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kamar_perawatan', function (Blueprint $table) {
            $table->dropForeign(['id_ruang_perawatan']);
        });
        Schema::dropIfExists('kamar_perawatan');
    }
};
