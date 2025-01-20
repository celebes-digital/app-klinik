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
        Schema::create('ruang_perawatan', function (Blueprint $table) {
            $table->id('id_ruang_perawatan');
            $table->char('nama', 100); // nama lokasi
            $table->char('status', 50)->nullable(); // status lokasi occupied unocuppied housekeeping dll
            $table->char('mode', 50)->nullable(); // mode ruangan or kamar 
            $table->char('pyhsical_type', 20)->nullable(); // site building dll
            $table->char('managing_organization', 255)->nullable(); // bapak nya
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruang_perawatan');
    }
};
