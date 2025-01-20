@php 
    $headers = [
        ['key' => 'no', 'label' => '#', 'class' => 'w-8'],
        ['key' => 'nama_poli', 'label' => 'Nama Poli'],
    ];
@endphp

<x-card
    title="Daftar Poliklinik" 
    class="col-span-2 h-fit"
>
    <x-table :headers="$headers" :rows="$poli">

        @scope('cell_no', $poli)
            {{ $loop->index + 1 }}
        @endscope

        @scope('actions', $poli)
            <div class="flex gap-2">
                <x-button 
                    icon="o-pencil-square" 
                    wire:click="$dispatch('set-poli', { id: {{ $poli->id_poli }}})" 
                    spinner 
                    class="btn-sm" 
                />
                <x-button 
                    icon="o-trash" 
                    wire:click="delete({{ $poli->id_poli }})" 
                    spinner 
                    class="btn-sm" 
                />
            </div>
        @endscope
    </x-table>
</x-card>
