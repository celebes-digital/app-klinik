<?php

namespace App\Livewire\Pemeriksaan\Poliklinik\Anamnesis;

use App\Models\Anamnesis;
use App\Models\Kunjungan;
use Livewire\Component;
use Mary\Traits\Toast;

class CreateAnamnesis extends Component
{
    use Toast;

    public Kunjungan $kunjungan;

    public $keluhan_utama               = '';
    public $keluhan_penyerta            = '';
    public $riwayat_penyakit_sekarang   = '';
    public $riwayat_penyakit_terdahulu  = '';
    public $riwayat_penyakit_keluarga   = '';
    public $riwayat_alergi              = '';
    public $riwayat_pengobatan          = '';

    public function mount()
    {
        $dataAnamnesis = Anamnesis::where('no_kunjungan', $this->kunjungan->no_kunjungan)->first();

        if ($dataAnamnesis) {
            $this->fill($dataAnamnesis);
        }
    }

    public function save()
    {
        Anamnesis::updateOrCreate(
            ['no_kunjungan' => $this->kunjungan->no_kunjungan],
            [
                ...$this->except('kunjungan'),
                'no_kunjungan'  => $this->kunjungan->no_kunjungan,
                'id_pasien'     => $this->kunjungan->id_pasien,
            ]
        );

        $this->success('Berhasil menyimpan data Anamnesis');
    }

    public function render()
    {
        return view('livewire.pemeriksaan.poliklinik.anamnesis.create-anamnesis');
    }
}
