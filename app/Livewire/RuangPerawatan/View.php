<?php

namespace App\Livewire\RuangPerawatan;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Ruang Perawatan')]
class View extends Component
{
    public function render()
    {
        return view('livewire.ruang-perawatan.view');
    }
}
