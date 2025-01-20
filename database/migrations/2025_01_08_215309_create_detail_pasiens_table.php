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
        Schema::create('detail_pasien', function (Blueprint $table) {
            $table->id('id_detail_pasien');
            $table->unsignedBigInteger('id_pasien');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade');
            $table->string('no_ihs')->nullable();
            $table->string('no_telp')->nullable();
            $table->text('alamat')->nullable();
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
            $table->enum('status_nikah', ['Annulled', 'Married', 'Unmarried', 'Divorced', 'Widowed'])->nullable()->default('Annulled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_pasien', function (Blueprint $table) {
            $table->dropForeign(['id_pasien']);
        });
        Schema::dropIfExists('detail_pasien');
    }
};
