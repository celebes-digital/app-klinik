<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('icd10', function (Blueprint $table) {
            $table->string('code', 8)->primary();
            $table->string('display');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('icd10');
    }
};
