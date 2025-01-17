<?php

namespace App\Livewire\Forms;

use App\Models\TenagaMedis;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TenagaMedisForm extends Form
{
    public ?TenagaMedis $tenagaMedis;

    public $id_tenaga_medis;

    #[Validate('required')]
    public $id_poliklinik;
    
    #[Validate('required')]
    public $nama = "";

    public $spesialisasi = "";

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

        $this->id_poliklinik = $tenagaMedis->id_poliklinik;
        $this->nama          = $tenagaMedis->nama;
        $this->spesialisasi  = $tenagaMedis->spesialisasi;
        $this->nik           = $tenagaMedis->nik;
        $this->alamat        = $tenagaMedis->alamat;
        $this->no_telp       = $tenagaMedis->no_telp;
        $this->kelamin       = $tenagaMedis->kelamin;
        $this->tgl_lahir     = $tenagaMedis->tgl_lahir;
        $this->no_str        = $tenagaMedis->no_str;
        $this->ihs           = $tenagaMedis->ihs;
    }

    public function store($id_tenaga_medis)
    {
        $this->validate();

        if (!$id_tenaga_medis) {
            TenagaMedis::create($this->all());
        } else {
            $this->tenagaMedis->update($this->all());
        }

        session()->flash('success', 'Data Tenaga Medis berhasil disimpan!');
    }
}
