<?php

namespace App\Livewire\Pemeriksaan\Poliklinik;

use App\Models\Kunjungan;
use Livewire\Component;

class DetailPemeriksaanPoliklinik extends Component
{
    public Kunjungan $kunjungan;

    public function render()
    {
        return view(
            'livewire.pemeriksaan.poliklinik.detail-pemeriksaan-poliklinik',
            [
                'kunjungan' => $this->kunjungan->with(['pasien', 'poliklinik', 'tenaga_medis'])
            ]
        );
    }
}
