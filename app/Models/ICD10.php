<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ICD10 extends Model
{
    protected $table        = 'icd10';
    protected $primaryKey   = 'code';
    protected $keyType      = 'string';
    public $incrementing    = false;
    public $timestamps      = false;

    protected $fillable = ['code', 'display'];
}
