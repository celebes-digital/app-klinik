<?php

namespace App\Livewire\Poli;

use App\Livewire\Forms\PoliForm;
use App\Models\Poliklinik;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class PoliStore extends Component
{
    use Toast;
    public PoliForm $form;
    public $idPoli;

    public $apiurl = "https://www.emsifa.com/api-wilayah-indonesia/api";

    public $filteredProvinsi    = [];
    public $filteredKabupaten   = [];
    public $filteredKecamatan   = [];
    public $filteredKelurahan   = [];

    public function mount()
    {
        $this->filteredProvinsi = Http::get($this->apiurl . '/provinces.json')->json();
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

    public function setLokasi()
    {
        $status = $this->form->setLokasiPuskesmas();

        if ($status) {
            $this->success('Data lokasi puskesmas berhasil diatur');

            $this->filteredKabupaten = Http::get($this->apiurl . "/regencies/{$this->form->provinsi}.json")->json();
            $this->filteredKecamatan = Http::get($this->apiurl . "/districts/{$this->form->kabupaten}.json")->json();
            $this->filteredKelurahan = Http::get($this->apiurl . "/villages/{$this->form->kecamatan}.json")->json();
            return;
        }
        $this->error('Data lokasi puskesmas gagal diatur');
        return;
    }

    #[On('set-poli')]
    public function setPoli($id)
    {
        $this->idPoli = $id;
        $this->form->setDataPoli(Poliklinik::find($id));
    }

    #[On('reset-form')]
    public function resetForm()
    {
        $this->form->reset();
        $this->idPoli = null;
    }

    public function save()
    {
        $this->form->store($this->idPoli);

        $this->success('Data poliklinik berhasil disimpan');
        $this->dispatch('reloadPoliList');
    }

    public function render()
    {
        return view('livewire.poli.poli-store', [
            'filteredProvinsi'  => $this->filteredProvinsi,
            'filteredKabupaten' => $this->filteredKabupaten,
            'filteredKecamatan' => $this->filteredKecamatan,
            'filteredKelurahan' => $this->filteredKelurahan,
        ]);
    }
}
