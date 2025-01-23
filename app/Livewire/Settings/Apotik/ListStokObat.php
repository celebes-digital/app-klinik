<?php

namespace App\Livewire\Settings\Apotik;

use App\Models\HistoriStokObat;
use App\Models\Obat;
use Livewire\Component;
use App\Models\StokObat;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ListStokObat extends Component
{
	use WithPagination;

	public $cardTitle	= 'Histori Restok Obat';
	public $namaObat 	= '';
	public $stokObat	= '';
	public $id_obat		= '';

	public function mount(StokObat $stok)
	{
		$obat = Obat::where('id_obat', $stok->id_obat)->first();
		$this->id_obat	= $stok->id_obat;
		$this->namaObat = $obat->nama_obat;
		$this->stokObat = $stok->stok . ' ' . $obat->satuan;
	}

	#[On('update-stok')]
    public function render()
    {
		$listStok = HistoriStokObat::where('id_obat', $this->id_obat)->paginate(10);

        return view('livewire.settings.apotik.list-stok-obat', [
			'listStok' => $listStok
		]);
    }
}
