<?php

namespace App\Livewire\Settings\Apotik;

use App\Models\Obat;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\ObatForm;

#[Title('Edit Data Obat')]
class EditObat extends Component
{
	public ObatForm $form;
	public $cardTitle = 'Edit Data Obat';

	public function mount(Obat $obat)
	{
		$this->form->setObat($obat);
	}

	public function save()
	{
		$this->form->update();
		session()->flash('success', 'Data Obat berhasil ditambahkan!');
		$this->redirect('/settings/apotik/daftar-obat', navigate: true);
	}

    public function render()
    {
        return view('livewire.settings.apotik.edit-obat', [
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
