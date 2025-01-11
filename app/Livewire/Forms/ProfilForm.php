<?php

namespace App\Livewire\Forms;

use App\Models\Profil;

use Livewire\Form;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class ProfilForm extends Form
{
    use WithFileUploads;
    public ?Profil $profil;

    #[Validate('required')]
    public $nama_puskesmas   = "";

    #[Validate('required')]
    public $alamat          = "";

    #[Validate('required|email')]
    public $email           = "";

    #[Validate('required|numeric|min:9')]
    public $no_telp         = "";

    #[Validate('required')]
    public $organization_id = "";

    #[Validate('required')]
    public $client_id       = "";

    #[Validate('required')]
    public $client_secret   = "";

    public $url             = "";

    #[Validate('required')]
    public $provinsi        = null;

    #[Validate('required')]
    public $kabupaten       = null;

    #[Validate('required')]
    public $kecamatan       = null;

    #[Validate('required')]
    public $kelurahan       = null;

    #[Validate('required')]
    public $kode_pos        = "";

    #[Validate('nullable|image|max:1024')] // 1MB Max
    public $logo            = null;

    public function setProfil(Profil $profil)
    {
        $this->profil = $profil;

        $this->nama_puskesmas  = $profil->nama_puskesmas;
        $this->alamat          = $profil->alamat;
        $this->email           = $profil->email;
        $this->no_telp         = $profil->no_telp;
        $this->organization_id = $profil->organization_id;
        $this->client_id       = $profil->client_id;
        $this->client_secret   = $profil->client_secret;
        $this->url             = $profil->url;
        $this->provinsi        = $profil->provinsi;
        $this->kabupaten       = $profil->kabupaten;
        $this->kecamatan       = $profil->kecamatan;
        $this->kelurahan       = $profil->kelurahan;
        $this->kode_pos        = $profil->kode_pos;
        $this->logo            = '/storage/img/' . $profil->logo;
    }

    public function store()
    {
        $this->validate();
        $data = Profil::first();

        if ($this->logo instanceof \Illuminate\Http\UploadedFile) {
            $fileName = 'logo' . '.' . $this->logo->getClientOriginalExtension();
            $this->logo->storeAs('img', $fileName, 'public');
            $this->logo = $fileName;
        }

        if (!$data) {
            Profil::create($this->all());
            return;
        }
        $this->profil->update($this->all());
    }
}
