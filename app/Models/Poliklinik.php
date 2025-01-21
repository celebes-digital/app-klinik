<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
    protected $table        = 'poliklinik';
    protected $primaryKey   = 'id_poli';
    public $timestamps      = false;

    protected $fillable = [
        'nama_poli',
        'tarif_dasar',
        'tarif_konsultasi',
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
