<?php

namespace App\Livewire\Settings\Apotik;

use App\Models\Obat;
use Livewire\Component;
// use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

#[Title('Daftar Obat')]
class ViewDaftarObat extends Component
{
	use WithPagination, Toast;

	public $cardTitle = 'Kelola Obat';
	public $filter = '';

	// #[On('notifikasi')]
	// public function notifikasi()
	// {

	// }

    public function render()
    {
        return view('livewire.settings.apotik.view-daftar-obat', [
			'daftarObat' => Obat::with('stok')->paginate(10)
		]);
    }
}
