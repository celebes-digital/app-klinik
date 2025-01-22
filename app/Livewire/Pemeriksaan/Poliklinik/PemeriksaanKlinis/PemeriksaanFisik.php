<?php

namespace App\Livewire\Pemeriksaan\Poliklinik\PemeriksaanKlinis;

use App\Models\Kunjungan;
use App\Models\PemeriksaanKlinis;
use Livewire\Component;
use Mary\Traits\Toast;

class PemeriksaanFisik extends Component
{
    use Toast;

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

    public $formPemeriksaanFisik = [];

    public Kunjungan $kunjungan;

    public function mount()
    {
        $pemeriksaanFisik = PemeriksaanKlinis::where('no_kunjungan', $this->kunjungan->no_kunjungan)->first();

        if ($pemeriksaanFisik != null) {
            $this->formPemeriksaanFisik = $pemeriksaanFisik->pemeriksaan_fisik ?? [];
        }
    }

    public function unsetData($key)
    {
        unset($this->formPemeriksaanFisik['pemeriksaan_fisik'][$key]);
    }

    public function save()
    {
        foreach ($this->formPemeriksaanFisik['pemeriksaan_fisik'] as $key => $value) {
            if (!key_exists('keterangan', $value))
                $this->formPemeriksaanFisik['pemeriksaan_fisik'][$key]['keterangan'] = '';
        }

        PemeriksaanKlinis::updateOrCreate(
            ['no_kunjungan'         => $this->kunjungan->no_kunjungan],
            ['pemeriksaan_fisik'    => $this->formPemeriksaanFisik]
        );

        $this->success('Data berhasil disimpan');
    }

    public function render()
    {
        return view('livewire.pemeriksaan.poliklinik.pemeriksaan-klinis.pemeriksaan-fisik');
    }
}
