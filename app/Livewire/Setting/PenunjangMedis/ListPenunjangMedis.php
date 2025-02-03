<?php

namespace App\Livewire\Setting\PenunjangMedis;

use Mary\Traits\Toast;
use Livewire\Component;
use App\Models\PenunjangMedis;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ListPenunjangMedis extends Component
{
    use Toast;
    use WithPagination;

    public $perPage = 10;

    public function delete(PenunjangMedis $penunjangMedis)
    {
        $penunjangMedis->delete();
        $this->success('Data berhasil dihapus');
    }

    public function penunjangMedis()
    {
        return PenunjangMedis::query()
            ->paginate($this->perPage);
    }

    #[On('reload-penunjang-medis-list')]
    public function render()
    {
        return view('livewire.setting.penunjang-medis.list-penunjang-medis', [
            'penunjang_medis' => $this->penunjangMedis(),
        ]);
    }
}
