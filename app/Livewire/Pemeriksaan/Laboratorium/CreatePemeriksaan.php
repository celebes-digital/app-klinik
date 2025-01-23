<?php

namespace App\Livewire\Pemeriksaan\Laboratorium;

use Livewire\Component;
use App\Livewire\Forms\PemeriksaanLaboratoriumForm;
use Livewire\Attributes\Title;

#[Title('Pemeriksaan Laboratorium')]
class CreatePemeriksaan extends Component
{
	public PemeriksaanLaboratoriumForm $form;
	public $cardTitle = 'Formulir Pemeriksaan';

    public function render()
    {
        return view('livewire.pemeriksaan.laboratorium.create-pemeriksaan');
    }
}
