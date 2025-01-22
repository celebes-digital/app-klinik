@php
    $headers = [
        ['key' => 'no', 'label' => '#', 'class' => 'w-4'],
        ['key' => 'kode_tindakan', 'label' => 'Kode', 'class' => 'w-12 flex-shrink'],
        ['key' => 'poliklinik.nama_poli', 'label' => 'Poliklinik'],
        ['key' => 'nama_tindakan', 'label' => 'Tindakan Medis', 'class' => 'w-44 grow'],
        ['key' => 'harga_satuan', 'label' => 'Harga Satuan', 'format' => ['currency', '0..', 'IDR ']],
        ['key' => 'harga_dasar', 'label' => 'Harga Dasar', 'format' => ['currency', '0..', 'IDR ']],
        ['key' => 'actions', 'label' => 'Aksi', 'class' => 'w-24'],
    ];
@endphp

<div>
    <x-card class="h-fit" title="Daftar Tindakan Medis" separator>
        <x-table 
            :headers="$headers" 
            :rows="$tindakan_medis"
            with-pagination
        >
            @scope('cell_no', $tindakan_medis)
                {{ $loop->index + 1 }}
            @endscope

            @scope('cell_actions', $tindakan_medis)
                <div class="flex gap-2 w-fit">
                    <x-button 
                        icon="o-pencil-square" 
                        type="button"
                        wire:click="$dispatch('set-data', {id: '{{ $tindakan_medis->kode_tindakan }}'})" 
                        spinner 
                        class="font-normal btn-sm btn-warning" 
                    />
                    <x-button 
                        type="button"
                        icon="o-trash" 
                        wire:click="showDeleteConfirmation('{{ $tindakan_medis->kode_tindakan }}')" 
                        spinner 
                        class="font-normal btn-sm btn-error" 
                    />
                </div>
            @endscope

            <x-slot:empty>
                <x-atoms.empty-state label="Belum ada data tindakan medis" />
            </x-slot:empty>
        </x-table>
    </x-card>

    <x-modal title="Hapus | {{$form->kode_tindakan}}" wire:model="showModalDelete" class="backdrop-blur">
        <div class="mb-5">Yakin ingin menghapus data  ini?</div>
        <x-button label="Batal" @click="$wire.showModalDelete = false" />
        <x-button label="Hapus" spinner wire:click="delete" class="btn-error" />
    </x-modal>
</div>
