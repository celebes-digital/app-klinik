<?php

namespace App\Livewire\Pasien;

use App\Models\Pasien as Pasien;
use Livewire\Component;

class Update extends Component
{
    public $data_pasien;
    public $id_pasien;

    public function mount($id_pasien)
    {
        $this->id_pasien = $id_pasien;
        $this->data_pasien = Pasien::where('id_pasien', $id_pasien)->first();
        // dd($this->data_pasien->attributesToArray());
    }

    public function render()
    {
        return view('livewire.pasien.update', [
            'dataPasien' => $this->dataPasien
        ]);
    }
}
