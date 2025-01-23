<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('icd10', function (Blueprint $table) {
            $table->string('code', 8)->primary();
            $table->string('display');
        });

        Artisan::call('db:seed', ['--class' => 'ICD10Seeder']);
    }

    public function down(): void
    {
        Schema::dropIfExists('icd10');
    }
};
