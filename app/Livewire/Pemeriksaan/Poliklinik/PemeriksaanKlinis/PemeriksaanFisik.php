<?php

namespace App\Livewire\Pemeriksaan\Poliklinik\PemeriksaanKlinis;

use Livewire\Component;

class PemeriksaanFisik extends Component
{
    public $pemeriksaanFisik = [
        'kepala',
        'mata',
        'telinga',
        'hidung',
        'rambut',
        'bibir',
        'gigi',
        'lidah',
        'langit',
        'leher',
        'tenggorokan',
        'tonsil',
        'dada',
        'payudara',
        'punggung',
        'perut',
        'genital',
        'anus',
        'dubur',
        'lengan_atas',
        'lengan_bawah',
        'tangan',
        'jari',
        'kuku',
        'persendian',
        'tungkai_atas',
        'tungkai_bawah',
        'jari_kaki',
        'kuku_kaki',
        'persendian_kaki'
    ];

    public function render()
    {
        return view('livewire.pemeriksaan.poliklinik.pemeriksaan-klinis.pemeriksaan-fisik');
    }
}
