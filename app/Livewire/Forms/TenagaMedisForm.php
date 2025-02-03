<?php

namespace App\Livewire\Forms;

use App\Models\Poliklinik;
use App\Models\TenagaMedis;
use App\Models\TenagaMedisPoliklinik;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TenagaMedisForm extends Form
{
    public ?TenagaMedis $tenagaMedis;

    public $id_tenaga_medis;

    public $id_poli = [];
    
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

    public function setTenagaMedis(TenagaMedis $tenagaMedis, $id_tenaga_medis = null)
    {
        $this->tenagaMedis  = $tenagaMedis;

        $this->id_poli       = $tenagaMedis->poliklinik()->pluck('id_poli')->toArray();
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

    public function store($id_tenaga_medis = null)
    {
        $this->validate();

        $tenagaMedis = $id_tenaga_medis ? TenagaMedis::find($id_tenaga_medis) : new TenagaMedis();

        $tenagaMedis->fill([
            'nama'       => $this->nama,
            'nik'        => $this->nik,
            'no_str'     => $this->no_str,
            'alamat'     => $this->alamat,
            'tgl_lahir'  => $this->tgl_lahir,
            'kelamin'    => $this->kelamin,
            'no_telp'    => $this->no_telp,
            'ihs'        => $this->ihs,
        ]);

        $tenagaMedis->save();


        if (!empty($this->id_poli)) {
            $tenagaMedis->poliklinik()->sync($this->id_poli);
        }

        session()->flash('success', 'Data Tenaga Medis berhasil disimpan!');
    }

}
