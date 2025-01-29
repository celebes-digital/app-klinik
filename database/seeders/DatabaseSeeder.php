<?php

namespace Database\Seeders;

use App\Models\DaftarPemeriksaan;
use App\Models\PenunjangMedis;
use App\Models\Gelar;
use App\Models\TenagaMedis;
use App\Models\User;
use Database\Factories\DetailPasienFactory;
use Database\Factories\GelarFactory;
use Database\Factories\PasienFactory;
use Database\Factories\PenunjangMedisFactory;
use Database\Factories\StaffFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Wajib diseed
        // ! php artisan migrate:fresh --seed
        // ! php artisan db:seed --class=DaftarPemeriksaanSeeder
        // PenunjangMedis::factory()->laboratorum()->create();
        // PenunjangMedis::factory()->radiologi()->create();
        // ! Command diatas 
        // ! php artisan db:seed

        DaftarPemeriksaan::factory()->radiologi()->create();
        DaftarPemeriksaan::factory()->radiologiGigi()->create();
        DaftarPemeriksaan::factory()->kedokteranNuklir()->create();

        // PasienFactory::new()->count(10)->create();
        // DetailPasienFactory::new()->count(10)->create();
        // StaffFactory::new()->count(10)->create();
        // TenagaMedis::factory()->count(10)->create();
        // Gelar::factory()->count(10)->create();
    }
}
