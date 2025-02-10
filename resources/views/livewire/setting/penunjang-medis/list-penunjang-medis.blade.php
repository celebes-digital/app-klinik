@php
    $headers = [
        ['key' => 'no', 'label' => '#', 'class' => 'w-8'],
        ['key' => 'kode_penunjang', 'label' => 'Kode', 'class' => 'w-12 flex-shrink'],
        ['key' => 'nama_penunjang', 'label' => 'Penunjang Medis', 'class' => 'w-64 grow'],
        ['key' => 'actions', 'label' => 'Aksi', 'class' => 'w-24'],
    ];
@endphp

<div>
    <x-card class="h-fit" title="Daftar Penunjang Medis" separator>
        <x-table 
            :headers="$headers" 
            :rows="$penunjang_medis"
            with-pagination
        >
            @scope('cell_no', $penunjang_medis)
                {{ ($this->getPage() - 1) * $this->perPage + $loop->index + 1 }}
            @endscope
            
            @scope('cell_actions', $penunjang_medis)
                <div class="flex gap-2 w-fit">
                    <x-button 
                        icon="o-pencil-square" 
                        type="button"
                        wire:click="$dispatch('set-data', {id: '{{$penunjang_medis->kode_penunjang}}'})" 
                        spinner 
                        class="font-normal btn-sm btn-warning" 
                        tooltip="Edit"
                    />
                    <x-delete-confirmation 
                        confirm:delete="delete('{{ $penunjang_medis->kode_penunjang }}')" 
                        :label="$penunjang_medis->nama_penunjang"
                        tooltip="Delete"
                    />
                    <x-button icon="o-arrow-down-on-square" spinner class="font-normal btn-sm btn-info" 
                        link="/setting/penunjang-medis/{{ $penunjang_medis->kode_penunjang }}"
                        tooltip="Daftar Pemeriksaan"
                    />
                </div>
            @endscope

            <x-slot:empty>
                <x-atoms.empty-state label="Belum ada data penunjang medis" />
            </x-slot:empty>
        </x-table>
    </x-card>
</div>
