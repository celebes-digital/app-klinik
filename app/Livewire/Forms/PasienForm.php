<?php

namespace App\Livewire\Forms;

use App\Models\DetailPasien;
use App\Models\Pasien;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PasienForm extends Form
{
    public ?Pasien          $pasien;
    public ?DetailPasien    $detailPasien;

    public $id_pasien = "";

    public $no_telp = "";

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

    public $kewarganegaraan = "";

    public $alamat = "";

    #[Validate('in:Married,Unmarried,Divorced,Widowed')]
    public $status_nikah = "";

    public $dataPasien = [];
    
    // #[Validate('required')]
    public $nama = "";

    // #[Validate('required')]
    public $tempat_lahir = "";

    // #[Validate('required|date')]
    public $tgl_lahir;

    // #[Validate('required|digits:16|unique:pasien,nik')]
    public $nik = "";

    #[Validate('digits:16')]
    public $nik_ibu = "";

    public $no_bpjs = "";

    // #[Validate('required|in:male,female')]
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
        $pasienData = [
            'nama'          => $this->nama,
            'tempat_lahir'  => $this->tempat_lahir,
            'tgl_lahir'     => $this->tgl_lahir,
            'nik'           => $this->nik,
            'nik_ibu'       => $this->nik_ibu,
            'kelamin'       => $this->kelamin,
            'lahir_kembar'  => $this->lahir_kembar,
            'no_bpjs'       => $this->no_bpjs,
        ];

        $pasien = Pasien::create($pasienData);

        $detailPasienData = [
            'id_pasien'         => $pasien->id_pasien,
            'no_telp'           => $this->no_telp,
            'provinsi'          => $this->provinsi,
            'kabupaten'         => $this->kabupaten,
            'kecamatan'         => $this->kecamatan,
            'kelurahan'         => $this->kelurahan,
            'rt'                => $this->rt,
            'rw'                => $this->rw,
            'kode_pos'          => $this->kode_pos,
            'email'             => $this->email,
            'pekerjaan'         => $this->pekerjaan,
            'pendidikan'        => $this->pendidikan,
            'kewarganegaraan'   => $this->kewarganegaraan,
            'alamat'            => $this->alamat,
            'status_nikah'      => $this->status_nikah,
        ];

        DetailPasien::create($detailPasienData);
    }
}
