<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemeriksaanKlinis extends Model
{
    protected $table        = 'pemeriksaan_klinis';
    protected $primaryKey   = 'no_kunjungan';
    protected $keyType      = 'string';
    public $incrementing    = false;

    protected $fillable = [
        'no_kunjungan',
        'pemeriksaan_tanda_vital',
        'pemeriksaan_fisik'
    ];

    protected $casts = [
        'pemeriksaan_tanda_vital'   => 'array',
        'pemeriksaan_fisik'         => 'array'
    ];

    public $timestamps = false;
}
