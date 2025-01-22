<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anamnesis extends Model
{
    protected $table        = 'anamnesis';
    protected $primaryKey   = 'no_kunjungan';
    protected $keyType      = 'string';
    public $incrementing    = false;
    public $timestamps      = false;

    public $fillable = [
        'no_kunjungan',
        'id_pasien',
        'keluhan_utama',
        'keluhan_penyerta',
        'riwayat_penyakit_sekarang',
        'riwayat_penyakit_terdahulu',
        'riwayat_penyakit_keluarga',
        'riwayat_alergi',
        'riwayat_pengobatan',
    ];
}
