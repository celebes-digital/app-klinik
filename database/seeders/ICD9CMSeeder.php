<?php

namespace Database\Seeders;

use App\Models\ICD9CM;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ICD9CMSeeder extends Seeder
{
    public function run(): void
    {
        ICD9CM::truncate();

        $file = fopen(base_path('database/data/ICD9_CM.csv'), 'r');

        $heading = true;
        while (($row = fgetcsv($file)) !== false) {
            if ($heading) {
                $heading = false;
                continue;
            }

            ICD9CM::create([
                'code'    => $row[0],
                'display' => $row[1],
            ]);
        }

        fclose($file);
    }
}
