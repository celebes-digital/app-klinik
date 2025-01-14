<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TindakanMedis extends Model
{
    protected $table        = 'tindakan_medis';
    protected $primaryKey   = 'kode_tindakan';
    protected $keyType      = 'string';
    public $timestamps      = false;

    protected $fillable = ['kode_tindakan', 'nama_tindakan', 'harga_satuan', 'harga_dasar'];
}
