<?php

namespace App\Livewire\Setting\Poli;

use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Poliklinik')]
class ViewPoli extends Component
{
    public function render()
    {
        return view('livewire.setting.poli.view-poli');
    }
}
