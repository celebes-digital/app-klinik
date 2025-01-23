<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarPemeriksaan extends Model
{
    protected $table = 'daftar_pemeriksaan';

    protected $primaryKey = 'id_daftar_pemeriksaan';

    protected $fillable = [
        'kode_penunjang',
        'nama',
        'keterangan',
    ];

    // public function itemPemeriksaan()
    // {
    //     return $this->hasMany(KamarPerawatan::class, 'id_ruang_perawatan');
    // }
}
