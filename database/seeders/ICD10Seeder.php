<?php

namespace Database\Seeders;

use App\Models\ICD10;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ICD10Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ICD10::truncate();

        $heading = true;

        $file = fopen(base_path('database/data/ICD10.csv'), 'r');

        while (($row = fgetcsv($file)) !== false) {
            if ($heading) {
                $heading = false;
                continue;
            }

            ICD10::create([
                'code'    => $row[0],
                'display' => $row[1],
            ]);
        }

        fclose($file);
    }
}
