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
        Schema::create('spesialisasi', function (Blueprint $table) {
            $table->id('id_spesialisasi');
            $table->unsignedBigInteger('id_profesi');
            $table->foreign('id_profesi')->references('id_profesi')->on('profesi')->onDelete('cascade');
            $table->string('nama');
            $table->string('code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spesialisasis', function (Blueprint $table) {
            $table->dropForeign(['id_profesi']);
        });
        Schema::dropIfExists('spesialisasi');
    }
};
