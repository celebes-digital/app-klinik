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
        Schema::create('histori_stok_obat', function (Blueprint $table) {
            $table->integerIncrements('id_histori_stok')->unsigned()->primary();
			$table->unsignedInteger('id_obat')->unsigned()->index();
			$table->date('tgl_restok');
			$table->float('stok_sebelumnya', 5)->default(0);
			$table->float('stok_ditambahkan', 5)->default(0);
			$table->string('produsen')->nullable();
			$table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_stok_obat');
    }
};
