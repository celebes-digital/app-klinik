<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TokenSatusehat extends Model
{
    protected $table        = 'token_satusehat';
    protected $primaryKey   = 'client_id';
    protected $keyType      = 'string';

    public $incrementing    = false;
    public $timestamps      = false;

    protected $fillable = ['client_id', 'access_token', 'issued_at', 'expires_in'];
}
