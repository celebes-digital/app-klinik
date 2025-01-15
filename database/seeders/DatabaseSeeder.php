<?php

namespace Database\Seeders;

use App\Models\TenagaMedis;
use App\Models\User;
use Database\Factories\DetailPasienFactory;
use Database\Factories\PasienFactory;
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
        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        PasienFactory::new()->count(10)->create();
        DetailPasienFactory::new()->count(10)->create();
        StaffFactory::new()->count(10)->create();
        TenagaMedis::factory()->count(10)->create();
    }
}
