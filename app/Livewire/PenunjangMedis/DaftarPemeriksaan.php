<?php

namespace App\Livewire\PenunjangMedis;

use App\Livewire\Forms\DaftarPemeriksaanForm;
use App\Models\DaftarPemeriksaan as ModelsDaftarPemeriksaan;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;

#[Title('Daftar Pemeriksaan')]
class DaftarPemeriksaan extends Component
{
    use Toast;

    public DaftarPemeriksaanForm $form;
    
    public $id_daftar_pemeriksaan;
    public $titleForm = "Input Data Pemeriksaan";
    public $kode_penunjang = '';
    public $perPage = 5;
    public $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'nama', 'label' => 'Pemeriksaan'],
        ['key' => 'keterangan', 'label' => 'Keterangan'],
        ['key' => 'actions', 'label' => 'Actions'],
    ];

    public function mount($kode_penunjang = null)
    {
        $this->form->kode_penunjang = $kode_penunjang;
    }

    #[On('changes')]
    public function editRuang($id = null)
    {
        $this->id_daftar_pemeriksaan = $id;
        $ruang = $id ? ModelsDaftarPemeriksaan::find($id) : null;
        $this->titleForm = "Update Ruang Perawatan";

        if ($ruang) {
            $this->form->setDaftarPemeriksaan($ruang);
        }
    }

    public function addNew()
    {
        $this->id_daftar_pemeriksaan = null;
        $this->titleForm = "Input Ruang Perawatan";
        $this->form->setDaftarPemeriksaan();
    }

    public function save()
    {
        $this->form->store($this->id_daftar_pemeriksaan);

        $this->success("Data Ruangan Telah Disimpan");

        $this->dispatch('save-ruang');
    }

    public function render()
    {
        $daftar_pemeriksaan = ModelsDaftarPemeriksaan::paginate($this->perPage);
    
        return view('livewire.penunjang-medis.daftar-pemeriksaan', [
            'daftar_pemeriksaan' => $daftar_pemeriksaan,
        ]);
    }
}
