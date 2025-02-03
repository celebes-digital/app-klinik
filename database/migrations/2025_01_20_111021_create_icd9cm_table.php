<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('icd9cm', function (Blueprint $table) {
            $table->string('code', 8)->primary();
            $table->string('display');
        });

        Artisan::call('db:seed', ['--class' => 'ICD9CMSeeder']);
    }

    public function down(): void
    {
        Schema::dropIfExists('icd9cm');
    }
};
