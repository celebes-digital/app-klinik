<?php

namespace Database\Seeders;

use App\Models\DaftarPemeriksaan;
use Illuminate\Database\Seeder;

class DaftarPemeriksaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama
        DaftarPemeriksaan::query()->delete();

        // Daftar file dan kolom mana yang digunakan untuk setiap kolom database
        $files = [
            [
                'path' => base_path('database/data/kategori_loinc_laboratorium.csv'),
                'columns' => [
                    'id_daftar_pemeriksaan' => 0,
                    'nama'                  => 1,
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
                    'kode_penunjang'        => 'LAB00000', // Nilai tetap
                    'nama'                  => $row[$fileConfig['columns']['nama']] ?? null,
                ];

                // Periksa jika kode sudah ada, jika tidak, tambahkan ke database
                DaftarPemeriksaan::create($data);
            }

            fclose($file);
        }
    }
}
