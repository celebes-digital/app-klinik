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
        Schema::create('tenaga_medis', function (Blueprint $table) {
            $table->id('id_tenaga_medis'); // Primary key
            $table->string('nama', 255); // Nama lengkap
            $table->string('nik', 16)->unique(); // NIK (unik)
            $table->string('no_str', 20)->nullable(); // No. STR (opsional)
            $table->text('alamat'); // Alamat lengkap
            $table->string('no_telp', 15); // Nomor telepon
            $table->string('ihs', 11); // Nomor HIS
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenaga_medis');
    }
};
