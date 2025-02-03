<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TenagaMedisPoliklinik extends Pivot
{
    protected $table        = 'poliklinik_tenaga_medis';
    protected $primaryKey   = 'id_tenaga_medis';
    public $timestamps      = false;
    
    protected $fillable = [
        'id_poli',
        'id_tenaga_medis'
    ];
}
