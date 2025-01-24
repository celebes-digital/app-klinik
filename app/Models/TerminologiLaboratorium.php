<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TerminologiLaboratorium extends Model
{
    protected $table = "terminologi_laboratorium";
    protected $primaryKey = "code";

    protected $fillable = [
        'code',
        'nama_pemeriksaan',
        'display'
    ];
    
    public $incrementing = false;
    public $timestamps = false;

    public function daftar_pemeriksaan()
    {
        return $this->belongsTo(DaftarPemeriksaan::class, 'id_daftar_pemeriksaan');
    }
}
