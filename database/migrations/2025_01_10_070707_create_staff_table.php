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
        Schema::create('staff', function (Blueprint $table) {
            $table->id('id_staff');
            $table->string('nama', 255);
            $table->date('tgl_lahir');
            $table->string('nik', 16)->unique();
            $table->enum('kelamin', ['male', 'female']);
            $table->text('alamat');
            $table->string('no_telp', 15);
            $table->string('no_str', 20)->nullable();
            $table->string('ihs', 11);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
