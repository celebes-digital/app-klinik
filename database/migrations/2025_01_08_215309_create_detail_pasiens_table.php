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
            $table->char('no_ihs')->nullable();
            $table->char('no_telp', 16)->nullable();
            $table->text('alamat', 100)->nullable();
            $table->char('provinsi', 2)->nullable();
            $table->char('kabupaten', 4)->nullable();
            $table->char('kecamatan', 7)->nullable();
            $table->char('kelurahan', 10)->nullable();
            $table->char('rt', 2)->nullable();
            $table->char('rw', 2)->nullable();
            $table->char('kode_pos', 5)->nullable();
            $table->char('email', 50)->nullable();
            $table->char('pekerjaan', 255)->nullable();
            $table->char('pendidikan', 100)->nullable();
            $table->char('kewarganegaraan', 100)->nullable();
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
