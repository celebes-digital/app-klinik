<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuangPerawatan extends Model
{
    protected $table = 'ruang_perawatan';

    protected $primaryKey = 'id_ruang_perawatan';

    protected $fillable = [
        'nama',
    ];

    public function kamarPerawatan()
    {
        return $this->hasMany(KamarPerawatan::class, 'id_ruang_perawatan');
    }
}
