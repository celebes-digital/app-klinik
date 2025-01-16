<?php

namespace App\Livewire\Settings\Apotik;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\ObatForm;
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
					'satuan' => 'pil',
					'nama'	=> 'Pil'
				],
				// [
				// 	'satuan' => 'puyer',
				// 	'nama'	=> 'Puyer'
				// ],
				// [
				// 	'satuan' => 'sirup',
				// 	'nama'	=> 'Sirup'
				// ],
			]
		]);
    }
}
