<?php

namespace App\Livewire\Forms;

use App\Models\TenagaMedis;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TenagaMedisForm extends Form
{
    public ?TenagaMedis $tenagaMedis;

    #[Validate('required')]
    public $nama = "";

    #[Validate('required|digits:16|unique:tenaga_medis,nik')]
    public $nik = "";

    #[Validate('required')]
    public $alamat = "";

    #[Validate('required')]
    public $tgl_lahir = "";

    #[Validate('required|in:male,female')]
    public $kelamin = "";

    #[Validate('required|digits_between:10,15')]
    public $no_telp = "";

    #[Validate('nullable|string|max:20')]
    public $no_str = "";

    #[Validate('required|numeric|digits_between:1,16')]
    public $ihs = "";
    public function setTenagaMedis(TenagaMedis $tenagaMedis)
    {
        $this->tenagaMedis  = $tenagaMedis;

        $this->nama         = $tenagaMedis->nama;
        $this->nik          = $tenagaMedis->nik;
        $this->alamat       = $tenagaMedis->alamat;
        $this->no_telp      = $tenagaMedis->no_telp;
        $this->kelamin      = $tenagaMedis->kelamin;
        $this->tgl_lahir    = $tenagaMedis->tgl_lahir;
        $this->no_str       = $tenagaMedis->no_str;
        $this->ihs          = $tenagaMedis->ihs;
    }

    public function store()
    {
        $this->validate();

        TenagaMedis::create([
            'nama'      => $this->nama,
            'nik'       => $this->nik,
            'alamat'    => $this->alamat,
            'no_telp'   => $this->no_telp,
            'kelamin'   => $this->kelamin,
            'tgl_lahir' => $this->tgl_lahir,
            'no_str'    => $this->no_str,
            'ihs'       => $this->ihs,
        ]);

        session()->flash('success', 'Data Tenaga Medis berhasil disimpan!');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->nama         = "";
        $this->nik          = "";
        $this->alamat       = "";
        $this->no_telp      = "";
        $this->kelamin      = "";
        $this->tgl_lahir    = "";
        $this->no_str       = "";
        $this->ihs          = "";
    }
}
