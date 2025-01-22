<?php

namespace App\Livewire\Registrasi\Kunjungan;

use App\Livewire\Forms\KunjunganForm;
use App\Models\Pasien;
use App\Models\Poliklinik;
use App\Models\TenagaMedis;
use Carbon\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;

#[Title('Kunjungan')]
class CreateKunjungan extends Component
{
    use Toast;

    public Pasien $pasien;
    public KunjunganForm $form;

    public function mount()
    {
        $this->form->no_kunjungan   = Carbon::now()->format('YmdHis');
        $this->form->tgl_kunjungan  = now()->format('Y-m-d H:i');
        $this->form->id_pasien      = $this->pasien->id_pasien;
    }

    public function save()
    {
        $this->form->store();

        $this->success('Kunjungan berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.registrasi.kunjungan.create-kunjungan', [
            'dokter'    => TenagaMedis::all(),
            'poli'      => Poliklinik::all(),
        ]);
    }
}
