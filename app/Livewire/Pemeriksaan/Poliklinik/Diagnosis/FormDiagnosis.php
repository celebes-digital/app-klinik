<?php

namespace App\Livewire\Pemeriksaan\Poliklinik\Diagnosis;

use App\Models\ICD10;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class FormDiagnosis extends Component
{
    public array $selectedOption = [];

    public Collection|array $diagnosisOptions = [];

    public function mount()
    {
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

    public function saveDiagnosis()
    {
        dd($this->selectedOption);
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
