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
            $table->string('code');
            $table->string('nama', 255);
            $table->string('satuan', 20)->nullable();
            $table->string('harga_dasar', 50)->nullable();
            $table->string('harga_pemeriksaan', 50)->nullable();
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('code')
                ->references('code')
                ->on('loinc')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_pemeriksaan', function (Blueprint $table) {
            $table->dropForeign(['code']);
        });

        Schema::dropIfExists('item_pemeriksaan');
    }
};
