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
        Schema::create('item_pemeriksaan', function (Blueprint $table) {
            $table->id('id_item_pemeriksaan');
            $table->unsignedBigInteger('id_daftar_pemeriksaan');
            $table->string('nama', 255);
            $table->string('loinc_display', 255)->nullable();
            $table->string('loinc_code', 50)->nullable();
            $table->string('satuan', 50)->nullable();
            $table->decimal('harga_dasar', 15, 2)->nullable();
            $table->decimal('harga_pemeriksaan', 15, 2)->nullable();
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('id_daftar_pemeriksaan')
                ->references('id_daftar_pemeriksaan')
                ->on('daftar_pemeriksaan')
                ->onDelete('cascade');
        });
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
