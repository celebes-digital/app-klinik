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
            $table->id('id_tenaga_medis');

            $table->unsignedTinyInteger('id_poliklinik');
            $table->foreign('id_poliklinik')->references('id')->on('poliklinik')->onDelete('cascade');
            $table->string('nama', 255);
            $table->string('nik', 16)->unique();
            $table->text('alamat');
            $table->date('tgl_lahir');
            $table->enum('kelamin', ['male', 'female']);
            $table->string('no_telp', 15);
            $table->string('no_str', 20)->nullable();
            $table->string('ihs', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenaga_medis', function (Blueprint $table) {
            $table->dropForeign(['id_poliklinik']);
        });
        Schema::dropIfExists('tenaga_medis');
    }
};
