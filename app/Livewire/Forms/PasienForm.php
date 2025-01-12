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

    public $no_telp = "";

    public $no_bpjs = "";

    #[Validate('required')]
    public $provinsi = "";

    #[Validate('required')]
    public $kabupaten = "";

    #[Validate('required')]
    public $kecamatan = "";

    #[Validate('required')]
    public $kelurahan = "";

    #[Validate('required')]
    public $rt = "";

    #[Validate('required')]
    public $rw = "";

    #[Validate('required|digits:5')]
    public $kode_pos = "";

    public $email = "";

    public $pekerjaan = "";

    public $pendidikan = "";

    #[Validate('required')]
    public $kewarganegaraan = "";

    #[Validate('required|in:Married,Unmarried,Divorced,Widowed')]
    public $status_nikah = "";

    public function setPasien(?Pasien $pasien = null)
    {
        if ($pasien) {
            $this->pasien = $pasien;

            $this->fill($pasien->toArray());
        }
    }
}
