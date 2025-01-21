<?php

namespace App\Livewire\Pemeriksaan\Poliklinik\Diagnosis;

use App\Models\Diagnosis;
use App\Models\ICD10;
use App\Models\Kunjungan;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Mary\Traits\Toast;

class FormDiagnosis extends Component
{
    use Toast;

    public Kunjungan $kunjungan;

    public array $selectedOption = [];

    public Collection|array $diagnosisOptions = [];

    public function mount()
    {
        $dataDiagnosis = Diagnosis::where('no_kunjungan', $this->kunjungan->no_kunjungan)->first();

        if ($dataDiagnosis) {
            $this->selectedOption = $dataDiagnosis->diagnosis;
        }

        $this->search();
    }

    public function addDiagnosis(ICD10 $option)
    {
        $this->selectedOption[] = $option;
    }

    public function removeDiagnosis($index)
    {
        unset($this->selectedOption[$index]);
    }

    public function save()
    {
        Diagnosis::updateOrCreate(
            ['no_kunjungan' => $this->kunjungan->no_kunjungan],
            [
                'no_kunjungan'  => $this->kunjungan->no_kunjungan,
                'diagnosis'     => $this->selectedOption
            ]
        );

        $this->success('Berhasil menyimpan data diagnosis');
    }

    public function search(string $value = '')
    {
        $this->diagnosisOptions = ICD10::query()
            ->where('display', 'like', "%$value%")
            ->orWhere('code', 'like', "%$value%")
            ->take(5)
            ->orderBy('code')
            ->get();
    }

    public function render()
    {
        return view('livewire.pemeriksaan.poliklinik.diagnosis.form-diagnosis');
    }
}
