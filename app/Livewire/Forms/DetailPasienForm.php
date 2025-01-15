<?php

namespace App\Livewire\Forms;

use App\Models\DetailPasien;
use App\Traits\WilayahIndonesia;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DetailPasienForm extends Form
{
    use WilayahIndonesia;
    public ?DetailPasien $detailPasien;

    public $id_pasien = "";

    public $no_telp = "";

    public $rt = "";

    public $rw = "";

    #[Validate('digits:5')]
    public $kode_pos = "";

    public $email = "";

    public $pekerjaan = "";

    public $pendidikan = "";

    public $kewarganegaraan = "";

    public $alamat = "";

    #[Validate('in:Married,Unmarried,Divorced,Widowed')]
    public $status_nikah = "";
    
    public function setDetailPasien(DetailPasien $detailPasien)
    {
        $this->detailPasien = $detailPasien;

        $this->id_pasien        = $detailPasien->id_pasien;
        $this->no_telp          = $detailPasien->no_telp;
        $this->provinsi         = $detailPasien->provinsi;
        $this->kabupaten        = $detailPasien->kabupaten;
        $this->kecamatan        = $detailPasien->kecamatan;
        $this->kelurahan        = $detailPasien->kelurahan;
        $this->rt               = $detailPasien->rt;
        $this->rw               = $detailPasien->rw;
        $this->kode_pos         = $detailPasien->kode_pos;
        $this->email            = $detailPasien->email;
        $this->pekerjaan        = $detailPasien->pekerjaan;
        $this->pendidikan       = $detailPasien->pendidikan;
        $this->kewarganegaraan  = $detailPasien->kewarganegaraan;
        $this->alamat           = $detailPasien->alamat;
        $this->status_nikah     = $detailPasien->status_nikah;
    }

    public function store()
    {
        $this->validate();
        DetailPasien::create($this->all());
    }
}
