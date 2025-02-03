<?php

namespace App\Livewire\Setting\PenunjangMedis;

use App\Livewire\Forms\PenunjangMedisForm;

use Livewire\Component;
use Livewire\Attributes\On;

use Mary\Traits\Toast;

class FormPenunjangMedis extends Component
{
    use Toast;
    public PenunjangMedisForm $form;

    #[On('set-data')]
    public function setData($id)
    {
        $this->form->setPenunjangMedis($id);
        $this->form->resetValidation();
    }

    #[On('reset-form')]
    public function resetForm()
    {
        $this->form->reset();
        $this->form->resetValidation();
    }

    public function save()
    {
        $this->form->store();
        $this->success('Data berhasil disimpan');

        $this->resetForm();
        $this->dispatch('reload-penunjang-medis-list');
    }

    public function render()
    {
        return view('livewire.setting.penunjang-medis.form-penunjang-medis');
    }
}
