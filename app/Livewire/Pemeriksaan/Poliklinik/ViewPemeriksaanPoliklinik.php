<?php

namespace App\Livewire\Pemeriksaan\Poliklinik;

use App\Models\Kunjungan;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Formulir Pemeriksaan')]
class ViewPemeriksaanPoliklinik extends Component
{
    public Kunjungan $kunjungan;

    public $selectedTab = 'anamnesis';

    public function render()
    {
        return view('livewire.pemeriksaan.poliklinik.view-pemeriksaan-poliklinik');
    }
}
