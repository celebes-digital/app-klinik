<?php

namespace App\Livewire\Settings\Apotik;

use Livewire\Component;
use App\Livewire\Forms\ObatForm;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

#[Title('Formulir Obat')]
class CreateObat extends Component
{
	use Toast;

	public ObatForm $form;
	public $cardTitle = 'Tambah Obat Baru';

	public function save()
	{
		$this->form->store();
		$this->success('Data Obat berhasil ditambahkan!');
		// $this->dispatch('notifikasi');
		// return $this->redirect('/settings/apotik/daftar-obat', true);
	}

    public function render()
    {
        return view('livewire.settings.apotik.create-obat', [
			'daftarSatuan'	=> [
				[
					'satuan' => 'tablet',
					'nama'	=> 'Tablet'
				],
				[
					'satuan' => 'kapsul',
					'nama'	=> 'Kapsul'
				],
				[
					'satuan' => 'botol',
					'nama'	=> 'Botol'
				],
				[
					'satuan' => 'vial',
					'nama'	=> 'Vial'
				],
				[
					'satuan' => 'bh',
					'nama'	=> 'Buah'
				],
				[
					'satuan' => 'kaplet',
					'nama'	=> 'Kaplet'
				],
				[
					'satuan' => 'puyer',
					'nama'	=> 'Puyer'
				],
				[
					'satuan' => 'pil',
					'nama'	=> 'Pil'
				],
				[
					'satuan' => 'sirup',
					'nama'	=> 'Sirup'
				],
			]
		]);
    }
}
