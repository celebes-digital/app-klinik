<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

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
        'status',
        'tgl_kunjungan',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

    public function tenaga_medis()
    {
        return $this->belongsTo(TenagaMedis::class, 'id_tenaga_medis', 'id_tenaga_medis');
    }

    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class, 'id_poli', 'id_poli');
    }
}
