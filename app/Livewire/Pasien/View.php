<?php

namespace App\Livewire\Pasien;

use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Pasien')]
class View extends Component
{
    use WithPagination;

    public $pasien;
    public $headers;
    public $perPage = 5;

    public function render()
    {
        return view('livewire.pasien.view');
    }
}
