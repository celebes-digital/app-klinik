<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kode_wilayah', function (Blueprint $table) {
            $table->char('kode_kelurahan', 10);
            $table->string('nama_kelurahan');
            $table->char('kode_kecamatan', 6);
            $table->string('nama_kecamatan');
            $table->char('kode_kabupaten', 4);
            $table->string('nama_kabupaten');
            $table->char('kode_provinsi', 2);
            $table->string('nama_provinsi');
        });

        Artisan::call('db:seed', ['--class' => 'KodeWilayahSeeder']);
    }

    public function down(): void
    {
        Schema::dropIfExists('kode_wilayah');
    }
};
