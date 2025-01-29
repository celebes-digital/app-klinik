<?php

namespace Database\Seeders;

use App\Models\ItemPemeriksaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemPemeriksaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemPemeriksaan::query()->delete();

        // Daftar file dan kolom mana yang digunakan untuk setiap kolom database
        $files = [
            [
                'path' => base_path('database/data/loinc_laboratorium.csv'),
                'columns' => [
                    'id_daftar_pemeriksaan' => 0,
                    'code'                  => 7,
                    'nama_pemeriksaan'      => 1,
                    'permintaan_hasil'      => 2,
                    'satuan'                => 5,
                    'display'               => 8,
                ],
            ],
            [
                'path' => base_path('database/data/loinc_radiologi.csv'),
                'columns' => [
                    'id_daftar_pemeriksaan' => 0,
                    'code'                  => 3,
                    'nama_pemeriksaan'      => 1,
                    'permintaan_hasil'      => 2,
                    'satuan'                => 12,
                    'display'               => 4,
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
                    'id_daftar_pemeriksaan' => $row[$fileConfig['columns']['id_daftar_pemeriksaan']] ?? null,
                    'code'                  => $row[$fileConfig['columns']['code']] ?? null,
                    'nama_pemeriksaan'      => $row[$fileConfig['columns']['nama_pemeriksaan']] ?? null,
                    'permintaan_hasil'      => $row[$fileConfig['columns']['permintaan_hasil']] ?? null,
                    'satuan'                => $row[$fileConfig['columns']['satuan']] ?? null,
                    'display'               => $row[$fileConfig['columns']['display']] ?? null,
                ];

                // Periksa jika kode sudah ada, jika tidak, tambahkan ke database
                ItemPemeriksaan::create($data);
            }

            fclose($file);
        }
    }
}
