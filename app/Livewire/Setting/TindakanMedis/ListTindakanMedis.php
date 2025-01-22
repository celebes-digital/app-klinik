<?php

namespace App\Livewire\Setting\TindakanMedis;

use App\Models\TindakanMedis;
use App\Livewire\Forms\TindakanMedisForm;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

use Mary\Traits\Toast;

class ListTindakanMedis extends Component
{
    use Toast;
    use WithPagination;

    public TindakanMedisForm $form;

    public $perPage = 10;

    public $showModalDelete = false;

    public function showDeleteConfirmation($id)
    {
        $this->showModalDelete      = true;
        $this->form->tindakanMedis  = TindakanMedis::where('kode_tindakan', $id)->first();
    }

    public function delete()
    {
        $this->form->delete();
        $this->success('Data berhasil dihapus');

        $this->showModalDelete = false;
        $this->success('Data berhasil dihapus');
    }

    public function tindakanMedis()
    {
        return TindakanMedis::query()
            ->with('poliklinik')
            ->paginate($this->perPage);
    }

    #[On('reload-tindakan-medis')]
    public function render()
    {
        return view('livewire.setting.tindakan-medis.list-tindakan-medis', [
            'tindakan_medis' => $this->tindakanMedis(),
        ]);
    }
}
