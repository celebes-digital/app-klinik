<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ICD10 extends Model
{
    protected $table    = 'data_icd10';
    protected $fillable = ['code', 'display'];
    public $timestamps  = false;
}
