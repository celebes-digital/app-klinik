<?php

namespace App\Livewire\Pemeriksaan\Poliklinik\PemeriksaanKlinis;

use App\Models\Kunjungan;
use App\Models\PemeriksaanKlinis;
use Livewire\Component;
use Mary\Traits\Toast;

class TandaVital extends Component
{
    use Toast;

    public Kunjungan $kunjungan;

    public $tandaVital = [
        'denyut_jantung' => [
            'display' => 'Denyut Jantung',
            'unit' => 'per menit',
        ],
        'pernapasan' => [
            'display' => 'Pernapasan',
            'unit' => 'per menit',
        ],
        'suhu_tubuh' => [
            'display' => 'Suhu Tubuh',
            'unit' => '°C',
        ],
        'sistole' => [
            'display' => 'Sistole',
            'unit' => 'mm[Hg]',
        ],
        'diastole' => [
            'display' => 'Diastole',
            'unit' => 'mm[Hg]',
        ],
        'tinggi_badan' => [
            'display' => 'Tinggi Badan',
            'unit' => 'cm',
        ],
        'berat_badan' => [
            'display' => 'Berat Badan',
            'unit' => 'kg',
        ],
        'luas_permukaan_tubuh' => [
            'display' => 'Luas Permukaan Tubuh',
            'unit' => 'm²',
        ],
    ];

    public $formTandaVital = [];

    public function mount()
    {
        $formTandaVital = PemeriksaanKlinis::where('no_kunjungan', $this->kunjungan->no_kunjungan)->first();

        if ($formTandaVital != null) {
            $this->formTandaVital = $formTandaVital->pemeriksaan_tanda_vital ?? [];
        }
    }

    public function save()
    {
        PemeriksaanKlinis::updateOrCreate(
            ['no_kunjungan'             => $this->kunjungan->no_kunjungan],
            ['pemeriksaan_tanda_vital'  => $this->formTandaVital]
        );

        $this->success('Data berhasil disimpan');
    }

    public function render()
    {
        return view('livewire.pemeriksaan.poliklinik.pemeriksaan-klinis.tanda-vital');
    }
}
