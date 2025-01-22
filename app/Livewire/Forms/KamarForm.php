<?php

namespace App\Livewire\Forms;

use App\Models\KamarPerawatan;
use App\Models\RuangPerawatan;
use Livewire\Attributes\Validate;
use Livewire\Form;

class KamarForm extends Form
{
    public ?KamarPerawatan $kamarPerawatan;

    #[Validate('required')]
    public $nama = "";

    #[Validate('required')]
    public $id_ruang_perawatan = "";

    #[Validate('required')]
    public $jumlah_kasur = "";

    #[Validate('required')]
    public $service_class = "";

    #[Validate('required')]
    public $status = "Unoccupied";

    public function setKamar(KamarPerawatan $kamarPerawatan = null)
    {
        $this->kamarPerawatan = $kamarPerawatan;

        $this->nama                 = $kamarPerawatan->nama ?? '';
        $this->id_ruang_perawatan   = $kamarPerawatan->id_ruang_perawatan ?? '';
        $this->jumlah_kasur         = $kamarPerawatan->jumlah_kasur ?? '';
        $this->service_class        = $kamarPerawatan->service_class ?? '';
        $this->status               = $kamarPerawatan->status ?? 'Unoccupied';
    }

    public function store($id_kamar_perawatan)
    {
        $this->validate();

        if (!$id_kamar_perawatan) {
            KamarPerawatan::create($this->all());
        } else {
            $this->kamarPerawatan->update($this->all());
        }
    }
}
