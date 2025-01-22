<?php

namespace App\Livewire\Perawatan;

use App\Livewire\Forms\RuangForm;
use App\Models\RuangPerawatan;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class Ruang extends Component
{
    use Toast;

    public RuangForm $form;
    public $id_ruang;
    public $titleForm = "Input Ruang Perawatan";

    #[On('edit-ruang')]
    public function editRuang($id = null)
    {
        $this->id_ruang = $id;
        $ruang = $id ? RuangPerawatan::find($id) : null;
        $this->titleForm = "Update Ruang Perawatan";
        
        if ($ruang) {
            $this->form->setRuang($ruang);
        }
    }
    
    public function addNew()
    {
        $this->titleForm = "Input Ruang Perawatan";
        $this->form->setRuang();
    }

    public function save()
    {
        $this->form->store($this->id_ruang);

        $this->success("Data Ruangan Telah Disimpan");

        $this->dispatch('save-ruang');
    }

    public function render()
    {
        return view('livewire.perawatan.ruang');
    }
}
