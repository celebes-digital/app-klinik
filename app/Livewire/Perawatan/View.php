<?php

namespace App\Livewire\Perawatan;

use App\Models\RuangPerawatan;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class View extends Component
{
    public function render()
    {
        return view('livewire.perawatan.view');
    }
}
