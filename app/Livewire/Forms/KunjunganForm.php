<?php

namespace App\Livewire\Forms;

use App\Models\Kunjungan;
use Livewire\Attributes\Validate;
use Livewire\Form;

use Illuminate\Support\Str;

class KunjunganForm extends Form
{
    public $no_kunjungan = '';

    public $id_pasien = '';

    #[Validate('required')]
    public $tgl_kunjungan = '';

    #[Validate('required')]
    public $id_tenaga_medis = '';

    #[Validate('required')]
    public $id_poli = '';

    public $keluhan_awal = '';

    public $id_kunjungan = '';

    public function store()
    {
        $this->validate();

        $this->id_kunjungan = Str::orderedUuid()->toString();
        Kunjungan::create($this->all());
    }
}
