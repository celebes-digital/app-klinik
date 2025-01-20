<?php

namespace App\Livewire\RuangPerawatan;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Tambah Ruang Perawatan')]
class Create extends Component
{
    public function render()
    {
        return view('livewire.ruang-perawatan.create');
    }
}
