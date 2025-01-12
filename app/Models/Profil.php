<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table    = 'profil';
    public $timestamps  = false;

    protected $fillable = [
        'nama_puskesmas',
        'alamat',
        'email',
        'no_telp',
        'url',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'kode_pos',
        'logo',
    ];
}
