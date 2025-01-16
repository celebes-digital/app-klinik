<?php

namespace App\Livewire\Settings\Apotik;

use Livewire\Component;
use Livewire\WithPagination;

class ListStokObat extends Component
{
	public $cardTitle	= 'Kelola Obat';
	public $filter		= '';

    public function render()
    {
        return view('livewire.settings.apotik.list-stok-obat');
    }
}
