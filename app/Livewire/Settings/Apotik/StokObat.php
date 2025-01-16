<?php

namespace App\Livewire\Settings\Apotik;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Stok Obat')]
class StokObat extends Component
{
    public function render()
    {
        return view('livewire.settings.apotik.stok-obat');
    }
}
