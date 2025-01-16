<?php

namespace App\Livewire\TenagaMedis;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Konfigurasi Tenaga Medis')]
class Konfigurasi extends Component
{
    public $gelar;
    public $headers;
    public $perPage = 2;

    public function render()
    {
        return view('livewire.tenaga-medis.konfigurasi');
    }
}
