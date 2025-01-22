<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TindakanMedisPasien extends Model
{
    protected $table        = 'tindakan_medis_pasien';
    protected $primaryKey   = 'no_kunjungan';
    protected $keyType      = 'string';
    public $incrementing    = false;
    public $timestamps      = false;

    public $casts = [
        'tindakan' => 'array'
    ];

    public $fillable = ['no_kunjungan', 'tindakan', 'total_harga'];
}
