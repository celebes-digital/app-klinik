<?php

namespace App\Livewire\Poli;

use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Poliklinik')]
class PoliView extends Component
{
    public function render()
    {
        return view('livewire.poli.poli-view');
    }
}
