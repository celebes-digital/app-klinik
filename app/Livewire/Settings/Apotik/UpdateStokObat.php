<?php

namespace App\Livewire\Settings\Apotik;

use App\Models\Obat;
use App\Models\StokObat;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

#[Title('Update Stok Obat')]
class UpdateStokObat extends Component
{
	use Toast, WithPagination;

	public StokObat $stok;

	// public function mount(StokObat $stok)
	// {
	// 	$this->stok = $stok;
	// 	$this->form->setStokObat($stok);
	// }

    public function render()
    {
        return view('livewire.settings.apotik.update-stok-obat');
    }
}
