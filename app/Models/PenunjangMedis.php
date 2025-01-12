<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenunjangMedis extends Model
{
    public $timestamps = false;
    public $primaryKey = 'kode_penunjang';
    protected $keyType = 'string';

    protected $fillable = [
        'kode_penunjang',
        'nama_penunjang',
    ];
}
