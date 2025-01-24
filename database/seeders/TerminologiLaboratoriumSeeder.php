<?php

namespace Database\Seeders;

use App\Models\TerminologiLaboratorium;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TerminologiLaboratoriumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TerminologiLaboratorium::truncate();

        $arrayCode = ['Code', 'Nama Pemeriksaan', 'Display'];

        $files = [
            [
                'path' => base_path('database/data/Terminologi_Laboratorium_1.csv'),
                'columns' => $arrayCode,
            ],
            [
                'path' => base_path('database/data/Terminologi_Laboratorium_Mikrobiologi.csv'),
                'columns' => $arrayCode,
            ],
            [
                'path' => base_path('database/data/Terminologi_Laboratorium_Patologi_Anatomi.csv'),
                'columns' => $arrayCode,
            ],
            [
                'path' => base_path('database/data/Terminologi_Laboratorium_Patologi.csv'),
                'columns' => $arrayCode,
            ],
        ];

        // Process each file
        foreach ($files as $fileConfig) {
            $file = fopen($fileConfig['path'], 'r');
            $heading = true;

            while (($row = fgetcsv($file)) !== false) {
                if ($heading) {
                    $heading = false;
                    continue;
                }

                // Map row data to corresponding columns
                $data = [];
                foreach ($fileConfig['columns'] as $index => $column) {
                    $data[$column] = $row[$index] ?? null; // Handle missing columns gracefully
                }

                // Insert data into the database
                TerminologiLaboratorium::create($data);
            }

            fclose($file);
        }
    }
}
