<?php

namespace App\Livewire\Perawatan;

use App\Models\KamarPerawatan;
use App\Models\RuangPerawatan;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class Table extends Component
{
    use Toast;
    public $headers;
    public $perPage = 5;
    public array $expanded = [];
    public $modalRuang = false;
    public $modalKamar = false;
    public $selectedRuangId = null;
    public $selectedKamarId = null;
    public $selectedRuangNama = null;
    public $selectedKamarNama = null;


    public function mount()
    {
        $this->headers = [
            ['key' => 'id_ruang_perawatan', 'label' => '#', 'class' => 'hidden'],
            ['key' => 'nama', 'label' => 'Nama'],
            ['key' => 'actions', 'label' => 'Action'],
        ];
    }

    public function openModalKamar($id, $nama)
    {
        $this->modalKamar = true;

        $this->selectedKamarNama = $nama;
        $this->selectedKamarId = $id;
    }
    
    public function openModalRuang($id, $nama)
    {
        $this->modalRuang = true;

        $this->selectedRuangNama = $nama;
        $this->selectedRuangId = $id;
    }

    public function deleteKamar()
    {
        $this->modalKamar = false; 
        KamarPerawatan::where('id_kamar_perawatan', $this->selectedKamarId)->delete();

        $this->dispatch('save-ruang');
        $this->success('Data berhasil Dihapus');
    }
    
    public function deleteRuang()
    {
        $this->modalRuang = false; 
        RuangPerawatan::where('id_ruang_perawatan', $this->selectedRuangId)->delete();
        
        $this->dispatch('save-ruang');
        $this->success('Data berhasil Dihapus');
    }

    #[On('save-ruang')]
    public function render()
    {
        $ruangPerawatan = RuangPerawatan::paginate($this->perPage);
        

        return view('livewire.perawatan.table', [
            'ruangPerawatan' => $ruangPerawatan,
        ]);
    }
}
