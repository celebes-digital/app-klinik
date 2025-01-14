<?php

namespace App\Livewire\PenunjangMedis;

use App\Livewire\Forms\PenunjangMedisForm;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;

#[Title('Penunjang Medis')]
class ListForm extends Component
{
    use Toast;
    public PenunjangMedisForm $form;

    public function setData($id)
    {
        $this->form->setPenunjangMedis($id);
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
        return view('livewire.penunjang-medis.list-form', [
            'penunjang_medis' => \App\Models\PenunjangMedis::all(),
        ]);
    }
}
