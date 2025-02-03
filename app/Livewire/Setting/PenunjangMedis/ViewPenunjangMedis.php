<?php

namespace App\Livewire\Setting\PenunjangMedis;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Penunjang Medis')]
class ViewPenunjangMedis extends Component
{
    public function render()
    {
        return view('livewire.setting.penunjang-medis.view-penunjang-medis');
    }
}
