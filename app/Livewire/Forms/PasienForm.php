<?php

namespace App\Livewire\Forms;

use App\Models\Pasien;
use App\Traits\WilayahIndonesia;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PasienForm extends Form
{
    use WilayahIndonesia;
    public ?Pasien $pasien;

    #[Validate('required')]
    public $nama = "";

    #[Validate('required')]
    public $tempat_lahir = "";

    #[Validate('required|date')]
    public $tgl_lahir;

    #[Validate('required|digits:16|unique:pasien,nik')]
    public $nik = "";

    #[Validate('digits:16')]
    public $nik_ibu = "";

    public $no_bpjs = "";

    #[Validate('required|in:male,female')]
    public $kelamin = "";

    public $lahir_kembar = false;

    public function setPasien(Pasien $pasien)
    {
        $this->pasien = $pasien;

        $this->nama             = $pasien->nama;
        $this->tempat_lahir     = $pasien->tempat_lahir;
        $this->tgl_lahir        = $pasien->tgl_lahir;
        $this->nik              = $pasien->nik;
        $this->nik_ibu          = $pasien->nik_ibu;
        $this->kelamin          = $pasien->kelamin;
        $this->lahir_kembar     = $pasien->lahir_kembar;
        $this->no_bpjs          = $pasien->no_bpjs;
    }
    
    public function store()
    {
        $this->validate();

        Pasien::create($this->all());
    }
}
