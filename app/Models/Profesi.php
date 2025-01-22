<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    /** @use HasFactory<\Database\Factories\ProfesiFactory> */
    use HasFactory;

    protected $table = 'profesi';
    protected $primaryKey = 'id_profesi';

    protected $fillable = [
        'id_profesi',
        'nama',
        'code',
    ];

    public function spesialisasi()
    {
        return $this->hasOne(Spesialisasi::class, 'id_profesi');
    }
}
