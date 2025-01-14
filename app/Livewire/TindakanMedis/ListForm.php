<?php

namespace App\Livewire\TindakanMedis;

use App\Livewire\Forms\TindakanMedisForm;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;

#[Title('Tindakan Medis')]
class ListForm extends Component
{
    use Toast;
    public TindakanMedisForm $form;

    public function setData($id)
    {
        $this->form->setTindakanMedis($id);
        $this->form->resetValidation();
    }

    public function resetForm()
    {
        $this->form->reset();
        $this->form->resetValidation();
    }

    public function save()
    {
        $this->form->store();

        $this->success('Data berhasil disimpan');
    }

    public function delete($id)
    {
        $this->form->delete($id);

        $this->success('Data berhasil dihapus');
    }

    public function render()
    {
        return view('livewire.tindakan-medis.list-form', [
            'tindakan_medis' => \App\Models\TindakanMedis::all()
        ]);
    }
}
