<?php

namespace App\Livewire\Profil;

use App\Livewire\Forms\ProfilForm;
use App\Models\Profil;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Mary\Traits\Toast;

#[Title('Profil')]
class Update extends Component
{
    use WithFileUploads;
    use Toast;

    public ProfilForm $form;

    public $selectedTab = "";

    public $apiurl = "https://www.emsifa.com/api-wilayah-indonesia/api";

    public $filteredProvinsi    = [];
    public $filteredKabupaten   = [];
    public $filteredKecamatan   = [];
    public $filteredKelurahan   = [];

    public function mount()
    {
        $profil = Profil::first();
        $this->selectedTab = "umum";

        $this->filteredProvinsi = Http::get($this->apiurl . '/provinces.json')->json();
        if ($profil) {
            $this->form->setProfil($profil);

            $this->filteredKabupaten = Http::get($this->apiurl . "/regencies/{$profil->provinsi}.json")->json();
            $this->filteredKecamatan = Http::get($this->apiurl . "/districts/{$profil->kabupaten}.json")->json();
            $this->filteredKelurahan = Http::get($this->apiurl . "/villages/{$profil->kecamatan}.json")->json();
        }
    }

    public function updatedFormProvinsi($value)
    {
        $this->filteredKabupaten = Http::get($this->apiurl . "/regencies/{$value}.json")->json();
        $this->filteredKecamatan = [];
        $this->filteredKelurahan = [];
    }

    public function updatedFormKabupaten($value)
    {
        $this->filteredKecamatan = Http::get($this->apiurl . "/districts/{$value}.json")->json();
        $this->filteredKelurahan = [];
    }

    public function updatedFormKecamatan($value)
    {
        $this->filteredKelurahan = Http::get($this->apiurl . "/villages/{$value}.json")->json();
    }

    public function save()
    {
        $this->form->store();

        $this->success('Data berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.profil.update', [
            'filteredProvinsi'  => $this->filteredProvinsi,
            'filteredKabupaten' => $this->filteredKabupaten,
            'filteredKecamatan' => $this->filteredKecamatan,
            'filteredKelurahan' => $this->filteredKelurahan,
        ]);
    }
}
