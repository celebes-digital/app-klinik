<?php

namespace App\Livewire\Settings\Apotik;

use App\Models\Obat;
use App\Models\StokObat;
use App\Livewire\Forms\StokObatForm;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

#[Title('Update Stok Obat')]
class FormStokObat extends Component
{
	use Toast, WithPagination;

	public StokObatForm $form;
	public $cardTitle = 'Update Stok Obat';

	public function save()
	{
		$this->form->store();
	}

	public function render()
	{
		return view('livewire.settings.apotik.form-stok-obat');
	}
}