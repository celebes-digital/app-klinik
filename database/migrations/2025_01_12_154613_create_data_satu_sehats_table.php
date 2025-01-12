<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_satu_sehat', function (Blueprint $table) {
            $table->char('organization_id', 100);
            $table->char('client_id', 100);
            $table->char('client_secret', 100);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_satu_sehat');
    }
};
