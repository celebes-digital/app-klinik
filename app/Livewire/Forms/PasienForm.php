<?php

namespace App\Livewire\Forms;

use App\Models\Pasien;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PasienForm extends Form
{
    public ?Pasien $pasien;

    #[Validate('required')]
    public $nama = "";

    #[Validate('required')]
    public $tempat_lahir = "";

    #[Validate('required|date')]
    public $tgl_lahir;

    #[Validate('required|digits:16|unique:pasien,nik')]
    public $nik = "";

    #[Validate('required|digits:16')]
    public $nik_ibu = "";

    #[Validate('required|in:male,female')]
    public $kelamin = "";

    public $lahir_kembar = false;

    public $hidup = true;

    #[Validate('required')]
    public $alamat = "";
    
    #[Validate('required')]
    public $no_telp = "";
    
    public $no_bpjs = "";

    public $provinsi = "";

    public $kabupaten = "";

    public $kecamatan = "";

    public $kelurahan = "";

    public $rt = "";

    public $rw = "";

    #[Validate('digits:5')]
    public $kode_pos = "";

    public $email = "";

    public $pekerjaan = "";

    public $pendidikan = "";

    #[Validate('required')]
    public $kewarganegaraan = "";

    #[Validate('required|in:Married,Unmarried,Divorced,Widowed')]
    public $status_nikah = "";

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
        $this->hidup            = $pasien->hidup;
        $this->alamat           = $pasien->alamat;
        $this->no_telp          = $pasien->no_telp;
        $this->no_bpjs          = $pasien->no_bpjs;
        $this->provinsi         = $pasien->provinsi;
        $this->kabupaten        = $pasien->kabupaten;
        $this->kecamatan        = $pasien->kecamatan;
        $this->kelurahan        = $pasien->kelurahan;
        $this->rt               = $pasien->rt;
        $this->rw               = $pasien->rw;
        $this->kode_pos         = $pasien->kode_pos;
        $this->email            = $pasien->email;
        $this->pekerjaan        = $pasien->pekerjaan;
        $this->pendidikan       = $pasien->pendidikan;
        $this->kewarganegaraan  = $pasien->kewarganegaraan;
        $this->status_nikah     = $pasien->status_nikah;
    }
    
    public function store()
    {
        $this->validate();

        $this->pasien->update($this->all());
    }
}
