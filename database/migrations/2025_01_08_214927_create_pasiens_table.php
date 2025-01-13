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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('nik')->unique();
            $table->string('nik_ibu');
            $table->enum('kelamin', ['male', 'female']);
            $table->boolean('lahir_kembar')->default(false);
            $table->boolean('hidup')->default(true);
            $table->text('alamat');
            $table->string('no_telp');
            $table->string('no_bpjs');
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('email')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->enum('status_nikah', ['Married', 'Unmarried', 'Divorced', 'Widowed']);
            $table->uuid('uuid')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
