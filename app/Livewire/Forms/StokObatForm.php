<?php

namespace App\Livewire\Forms;

use App\Models\StokObat;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StokObatForm extends Form
{
	#[Validate('required', message: 'Jumlah Obat belum diisi')]
	#[Validate('min:1', message: 'Jumlah Obat minimal 1 karakter')]
	public $stok = '';

	// #[Validate('required', message: 'Satuan belum dipilih')]
	// #[Validate('min:2', message: 'Satuan minimal 2 karakter')]

	public function store()
	{
		$this->validate();
		$stok = StokObat::updateOrCreate($this->only(['stok']));
		$this->reset('nama_obat', 'satuan');
	}
}