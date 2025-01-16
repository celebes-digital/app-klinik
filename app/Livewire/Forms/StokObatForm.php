<?php

namespace App\Livewire\Forms;

use App\Models\StokObat;
use App\Models\HistoriStokObat;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StokObatForm extends Form
{
	// public ?StokObat $stokObat;

	public $stokObat	= '';
	public $id_obat		= '';

	#[Validate('required', message: 'Jumlah Obat belum diisi')]
	#[Validate('gt:0', message: 'Jumlah Obat tidak boleh 0')]
	public $stok		= '';

	public $produsen	= '';
	public $keterangan	= '';

	#[Validate('required', message: 'Tgl. belum diisi')]
	public $tgl_restok	= '';

	public function setStokObat($stok)
	{
		$this->stokObat		= $stok->stok;
		$this->tgl_restok	= $stok->tgl_restok;
		$this->id_obat		= $stok->id_obat;
	}

	public function store()
	{
		$this->validate();
		$jumlahStok = $this->stok + $this->stokObat;

		HistoriStokObat::create([
			'id_obat'			=> $this->id_obat,
			'tgl_restok'		=> $this->tgl_restok,
			'stok_sebelumnya'	=> $this->stokObat,
			'stok_ditambahkan'	=> $this->stok,
			'produsen'			=> $this->produsen ,
			'keterangan'		=> $this->keterangan
		]);

		Stokobat::updateOrCreate(
			['id_obat' => $this->id_obat],
			[
				'id_obat'	=> $this->id_obat,
				'stok'		=> $jumlahStok
			]
		);

		$this->reset(['stok', 'tgl_restok', 'produsen', 'keterangan']);
	}
}