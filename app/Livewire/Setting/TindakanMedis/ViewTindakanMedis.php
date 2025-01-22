<?php

namespace App\Livewire\Setting\TindakanMedis;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Tindakan Medis')]
class ViewTindakanMedis extends Component
{
    public function render()
    {
        return view('livewire.setting.tindakan-medis.view-tindakan-medis');
    }
}
