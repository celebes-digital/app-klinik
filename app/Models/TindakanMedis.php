<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TindakanMedis extends Model
{
    protected $table        = 'tindakan_medis';
    protected $primaryKey   = 'kode_tindakan';
    protected $keyType      = 'string';
    public $timestamps      = false;

    protected $fillable = ['kode_tindakan', 'id_poliklinik', 'nama_tindakan', 'harga_satuan', 'harga_dasar'];

    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class, 'id_poliklinik', 'id_poli');
    }
}
