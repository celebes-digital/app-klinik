<?php

namespace App\Livewire\Antrian;

use App\Models\Kunjungan;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Antrian')]
class ListAntrian extends Component
{
    use WithPagination;

    public $perPage = 10;

    public function antrian(): LengthAwarePaginator
    {
        return Kunjungan::orderBy('no_kunjungan', 'desc')->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.antrian.list-antrian', [
            'antrian' => $this->antrian(),
        ]);
    }
}
