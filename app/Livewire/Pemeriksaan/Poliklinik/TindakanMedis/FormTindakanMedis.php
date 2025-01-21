<?php

namespace App\Livewire\Pemeriksaan\Poliklinik\TindakanMedis;

use App\Models\Diagnosis;
use App\Models\Kunjungan;
use App\Models\TindakanMedis;
use App\Models\TindakanMedisPasien;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Mary\Traits\Toast;

class FormTindakanMedis extends Component
{
    use Toast;

    public Kunjungan $kunjungan;

    public array $selectedOption = [];

    public int $total_harga = 0;

    public Collection|array $tindakanOptions = [];

    public function mount()
    {
        $tindakan = TindakanMedisPasien::where('no_kunjungan', $this->kunjungan->no_kunjungan)->first();

        if ($tindakan) {
            $this->selectedOption   = $tindakan->tindakan;
            $this->total_harga      = $tindakan->total_harga;
        }

        $this->search();
    }

    public function addDiagnosis(TindakanMedis $option)
    {
        $this->total_harga += $option->harga_dasar;
        $this->selectedOption[] = $option;
    }

    public function removeDiagnosis($index)
    {
        $this->total_harga -= $this->selectedOption[$index]->harga_dasar;
        unset($this->selectedOption[$index]);
    }

    public function save()
    {
        TindakanMedisPasien::updateOrCreate(
            ['no_kunjungan' => $this->kunjungan->no_kunjungan],
            [
                'no_kunjungan'  => $this->kunjungan->no_kunjungan,
                'tindakan'      => $this->selectedOption,
                'total_harga'   => $this->total_harga,
            ]
        );

        $this->success('Berhasil menyimpan data tindakan medis');
    }

    public function search(string $value = '')
    {
        $this->tindakanOptions = TindakanMedis::query()
            ->where('nama_tindakan', 'like', "%$value%")
            ->orWhere('kode_tindakan', 'like', "%$value%")
            ->take(7)
            ->orderBy('kode_tindakan')
            ->get();
    }

    public function render()
    {
        return view('livewire.pemeriksaan.poliklinik.tindakan-medis.form-tindakan-medis');
    }
}
