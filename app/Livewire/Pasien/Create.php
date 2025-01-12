<?php

namespace App\Livewire\Pasien;

use App\Livewire\Forms\PasienForm;
use App\Models\Pasien;
use App\Traits\HandlesWilayah;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{
    use HandlesWilayah;
    use Toast;

    public PasienForm $form;
    public $selectedTab = 'umum';
    public $config1;

    public $filteredProvinsi = [];
    public $filteredKabupaten = [];
    public $filteredKecamatan = [];
    public $filteredKelurahan = [];

    public function mount()
    {
        $this->filteredProvinsi = Http::get("{$this->apiurl}/provinces.json")->json();
    }

    public function updatedFormProvinsi($value)
    {
        $this->filteredKabupaten = $this->loadKabupaten($value);
        $this->filteredKecamatan = [];
        $this->filteredKelurahan = [];
    }

    public function updatedFormKabupaten($value)
    {
        $this->filteredKecamatan = $this->loadKecamatan($value);
        $this->filteredKelurahan = [];
    }

    public function updatedFormKecamatan($value)
    {
        $this->filteredKelurahan = $this->loadKelurahan($value);
    }

    public function save()
    {
        // Simpan data pasien
        Pasien::create($this->form);

        session()->flash('message', 'Data pasien berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.pasien.create', [
            'filteredProvinsi' => $this->filteredProvinsi,
            'filteredKabupaten' => $this->filteredKabupaten,
            'filteredKecamatan' => $this->filteredKecamatan,
            'filteredKelurahan' => $this->filteredKelurahan,
        ]);
    }
}
