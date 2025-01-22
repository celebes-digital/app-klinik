<?php

namespace App\Livewire\Setting\TindakanMedis;

use App\Livewire\Forms\TindakanMedisForm;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

use Mary\Traits\Toast;

class FormTindakanMedis extends Component
{
    use Toast;
    use WithPagination;

    public TindakanMedisForm $form;


    public function placeholder()
    {
        return <<<'HTML'
                <div>
                    Loading...
                </div>
            HTML;
    }

    #[On('set-data')]
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
        $this->success('Data setting tindakan berhasil disimpan.');

        $this->dispatch('reload-tindakan-medis');
    }

    public function render()
    {
        return view('livewire.setting.tindakan-medis.form-tindakan-medis', [
            'poliklinik'     => \App\Models\Poliklinik::all(),
        ]);
    }
}
