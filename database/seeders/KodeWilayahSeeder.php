<?php

namespace Database\Seeders;

use App\Models\KodeWilayah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KodeWilayahSeeder extends Seeder
{
    public function run(): void
    {
        KodeWilayah::truncate();

        $heading = true;

        $file = fopen(base_path('database/data/Kode_Wilayah.csv'), 'r');

        while (($row = fgetcsv($file)) !== false) {
            if ($heading) {
                $heading = false;
                continue;
            }

            KodeWilayah::create([
                'kode_kelurahan' => $row[0],
                'nama_kelurahan' => $row[1],
                'kode_kecamatan' => $row[2],
                'nama_kecamatan' => $row[3],
                'kode_kabupaten' => $row[4],
                'nama_kabupaten' => $row[5],
                'kode_provinsi' => $row[6],
                'nama_provinsi' => $row[7],
            ]);
        }

        fclose($file);
    }
}
