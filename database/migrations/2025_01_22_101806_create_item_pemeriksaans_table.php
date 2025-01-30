<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_pemeriksaan', function (Blueprint $table) {
            $table->id('id_item_pemeriksaan');
            $table->unsignedBigInteger('id_daftar_pemeriksaan');
            $table->string('code', 1000)->nullable();
            $table->string('nama_pemeriksaan', 255);
            $table->string('permintaan_hasil', 20)->nullable();
            $table->string('satuan', 100)->nullable();
            $table->string('display', 1000)->nullable();
            $table->string('harga_dasar', 50)->nullable();
            $table->string('harga_pemeriksaan', 50)->nullable();
            $table->text('note', 200)->nullable();
            $table->timestamps();

            $table->foreign('id_daftar_pemeriksaan')
                ->references('id_daftar_pemeriksaan')
                ->on('daftar_pemeriksaan')
                ->onDelete('cascade');
        });

        Artisan::call('db:seed', ['--class' => 'ItemPemeriksaanSeeder']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_pemeriksaan', function (Blueprint $table) {
            $table->dropForeign(['id_daftar_pemeriksaan']);
        });

        Schema::dropIfExists('item_pemeriksaan');
    }
};
