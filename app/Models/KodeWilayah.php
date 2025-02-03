<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KodeWilayah extends Model
{
    protected $table        = 'kode_wilayah';
    protected $primaryKey   = 'kode_kelurahan';
    protected $keyType      = 'string';

    public $incrementing    = false;
    public $timestamps      = false;

    protected $fillable     = [
        'kode_kelurahan',
        'nama_kelurahan',
        'kode_kecamatan',
        'nama_kecamatan',
        'kode_kabupaten',
        'nama_kabupaten',
        'kode_provinsi',
        'nama_provinsi',
    ];
}
