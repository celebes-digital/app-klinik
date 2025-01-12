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
        Schema::create('profil', function (Blueprint $table) {
            $table->tinyInteger('id', true, true);

            $table->char('nama_puskesmas', 50);
            $table->text('alamat', 100);
            $table->char('email', 50);
            $table->char('no_telp', 16);
            $table->char('organization_id', 100);
            $table->char('client_id', 100);
            $table->char('client_secret', 100);

            $table->string('url');
            $table->char('provinsi', 2);
            $table->char('kabupaten', 4);
            $table->char('kecamatan', 7);
            $table->char('kelurahan', 10);
            $table->char('kode_pos', 6);
            $table->string('logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil');
    }
};
