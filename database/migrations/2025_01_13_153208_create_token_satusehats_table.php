<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('token_satusehat', function (Blueprint $table) {
            $table->string('client_id', 50);
            $table->string('access_token', 30);
            $table->bigInteger('issued_at', unsigned: true);
            $table->smallInteger('expires_in', unsigned: true);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('token_satusehat');
    }
};
