<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Obat extends Model
{
	protected $table		= 'obat';
	protected $primaryKey	= 'id_obat';
	protected $fillable 	= ['nama_obat', 'kelas_terapi', 'satuan'];
	public $timestamps		= false;

	public function stok(): HasOne
	{
		return $this->hasOne(StokObat::class, 'id_obat');
	}
}