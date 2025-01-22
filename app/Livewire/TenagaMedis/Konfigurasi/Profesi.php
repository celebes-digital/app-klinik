<?php

namespace App\Livewire\TenagaMedis\Konfigurasi;

use App\Livewire\Forms\ProfesiForm;
use App\Models\Profesi as ModelsProfesi;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class Profesi extends Component
{
    use Toast;
    public ProfesiForm $form;
    public $idProfesi;
    public $titleForm = "Input Profesi";
    public $gelar;
    public $perPage = 2;

    public $headers = [
        ['key' => 'no',         'label' => '#'],
        ['key' => 'nama',       'label' => 'Nama'],
        ['key' => 'code',       'label' => 'Kode'],
        ['key' => 'actions',    'label' => 'Action'],
    ];

    public function addNew()
    {
        $this->titleForm = "Input Profesi";

        $this->form->setProfesi();
    }

    #[On('edit-profesi')]
    public function editProfesi($id = null)
    {
        // dd($id);
        $this->titleForm = "Update Profesi";
        $this->idProfesi = $id;
        $profesi = $id ? ModelsProfesi::find($id) : '';

        $profesi ? $this->form->setProfesi($profesi) : '';
    }

    public function save()
    {
        $this->form->store($this->idProfesi);

        $this->success('Data Profesi Telah Disimpan.');

        $this->dispatch('changes');
    }

    public function render()
    {
        $profesi = ModelsProfesi::paginate(5);

        return view('livewire.tenaga-medis.konfigurasi.profesi', [
            'profesi' => $profesi
        ]);
    }
}
