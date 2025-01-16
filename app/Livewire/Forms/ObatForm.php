<?php

namespace App\Livewire\Forms;

use App\Models\Obat;
use App\Models\StokObat;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ObatForm extends Form
{
	public ?Obat $obat;

	#[Validate('required', message: 'Nama Obat belum diisi')]
	#[Validate('min:5', message: 'Nama Obat minimal 5 karakter')]
	public $nama_obat = '';

	// #[Validate('required', message: 'Nama Obat belum diisi')]
	// #[Validate('min:5', message: 'Nama Obat minimal 5 karakter')]
    // public $kelasTerapi = '';

	#[Validate('required', message: 'Satuan belum dipilih')]
	#[Validate('min:2', message: 'Satuan minimal 2 karakter')]
    public $satuan = '';

    public function store()
	{
		$this->validate();

		$obat = Obat::create($this->only(['nama_obat', 'satuan']));

		if ( $obat )
		{
			StokObat::create(['id_obat' => $obat->id_obat]);
		}

		$this->reset('nama_obat', 'satuan');
	}

	public function setObat($obat) // Obat $obat
	{
		$this->obat			= $obat;
		$this->nama_obat	= $obat->nama_obat;
		$this->satuan 		= $obat->satuan;
	}

	public function update()
	{
		$this->validate();
		// dd($this->all());
		$this->obat->update($this->only(['nama_obat', 'satuan']));
	}
}