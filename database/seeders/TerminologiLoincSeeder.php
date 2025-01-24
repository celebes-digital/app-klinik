<?php

namespace Database\Seeders;

use App\Models\TerminologiLoinc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TerminologiLoincSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TerminologiLoinc::query()->delete();

        // Daftar file dan kolom mana yang digunakan untuk setiap kolom database
        $files = [
            [
                'path' => base_path('database/data/Terminologi_Radiologi_Gigi.csv'),
                'columns' => [
                    'code'              => 4,
                    'nama_pemeriksaan'  => 2,
                    'display'           => 5,
                ],
            ],
            [
                'path' => base_path('database/data/Terminologi_Radiologi.csv'),
                'columns' => [
                    'code'              => 4,
                    'nama_pemeriksaan'  => 2,
                    'display'           => 5,
                ],
            ],
            [
                'path' => base_path('database/data/Terminologi_Radiologi_BMD.csv'),
                'columns' => [
                    'code'              => 3,
                    'nama_pemeriksaan'  => 1,
                    'display'           => 4,
                ],
            ],
            [
                'path' => base_path('database/data/Terminologi_Radiologi_CT_CTA.csv'),
                'columns' => [
                    'code'              => 3,
                    'nama_pemeriksaan'  => 1,
                    'display'           => 4,
                ],
            ],
            [
                'path' => base_path('database/data/Terminologi_Radiologi_MRI_MRA.csv'),
                'columns' => [
                    'code'              => 3,
                    'nama_pemeriksaan'  => 1,
                    'display'           => 4,
                ],
            ],
            [
                'path' => base_path('database/data/Terminologi_Radiologi_RF_RFA.csv'),
                'columns' => [
                    'code'              => 3,
                    'nama_pemeriksaan'  => 1,
                    'display'           => 4,
                ],
            ],
            [
                'path' => base_path('database/data/Terminologi_Radiologi_US_MG.csv'),
                'columns' => [
                    'code'              => 3,
                    'nama_pemeriksaan'  => 1,
                    'display'           => 4,
                ],
            ],
            [
                'path' => base_path('database/data/Terminologi_Laboratorium_Patologi.csv'),
                'columns' => [
                    'code'              => 8,
                    'nama_pemeriksaan'  => 2,
                    'display'           => 9,
                ],
            ],
            [
                'path' => base_path('database/data/Terminologi_Laboratorium_1.csv'),
                'columns' => [
                    'code'              => 8,
                    'nama_pemeriksaan'  => 2,
                    'display'           => 9,
                ],
            ],
            [
                'path' => base_path('database/data/Terminologi_Laboratorium_Mikrobiologi.csv'),
                'columns' => [
                    'code'              => 8,
                    'nama_pemeriksaan'  => 2,
                    'display'           => 9,
                ],
            ],
            [
                'path' => base_path('database/data/Terminologi_Laboratorium_Patologi_Anatomi.csv'),
                'columns' => [
                    'code'              => 6,
                    'nama_pemeriksaan'  => 2,
                    'display'           => 3,
                ],
            ],
        ];

        // Proses setiap file
        foreach ($files as $fileConfig) {
            $file = fopen($fileConfig['path'], 'r');
            $heading = true;

            while (($row = fgetcsv($file)) !== false) {
                if ($heading) {
                    $heading = false; // Lewati baris header
                    continue;
                }

                // Ambil data sesuai konfigurasi kolom
                $data = [
                    'code'              => $row[$fileConfig['columns']['code']] ?? null,
                    'nama_pemeriksaan'  => $row[$fileConfig['columns']['nama_pemeriksaan']] ?? null,
                    'display'           => $row[$fileConfig['columns']['display']] ?? null,
                ];

                // Periksa jika kode sudah ada, jika tidak, tambahkan ke database
                if (!TerminologiLoinc::where('code', $data['code'])->exists()) {
                    TerminologiLoinc::create($data);
                }
            }

            fclose($file);
        }
    }
}
