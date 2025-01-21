<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KamarPerawatan extends Model
{
    protected $table = 'kamar_perawatan';

    protected $primaryKey = 'id_kamar_perawatan';

    protected $fillable = [
        'id_ruang_perawatan',
        'nama', 
        'status',
        'service_class',
        'pyhsical_type',
        'jumlah_kasur',
    ];

    public function ruangPerawatan()
    {
        return $this->belongsTo(RuangPerawatan::class, 'id_ruang_perawatan');
    }
}
