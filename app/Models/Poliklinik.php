<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
    protected $table = 'poliklinik';
    public $timestamps = false;

    protected $fillable = [
        'nama_poli',
        'alamat',
        'email',
        'no_telp',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'kode_pos',
    ];
}
