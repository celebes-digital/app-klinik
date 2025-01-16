<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $table        = 'kunjungan';
    protected $primaryKey   = 'no_kunjungan';
    protected $keyType      = 'string';
    public $incrementing    = false;
    public $timestamps      = false;

    protected $fillable = [
        'no_kunjungan',
        'id_kunjungan',
        'id_pasien',
        'id_tenaga_medis',
        'id_poli',
        'keluhan_awal',
        'tgl_kunjungan',
    ];
}
