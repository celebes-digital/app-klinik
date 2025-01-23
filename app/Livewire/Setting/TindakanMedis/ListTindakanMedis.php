<?php

namespace App\Livewire\Setting\TindakanMedis;

use App\Models\TindakanMedis;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

use Mary\Traits\Toast;

class ListTindakanMedis extends Component
{
    use Toast;
    use WithPagination;

    public $perPage = 10;

    public function delete(TindakanMedis $tindakanMedis)
    {
        $tindakanMedis->delete();
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
