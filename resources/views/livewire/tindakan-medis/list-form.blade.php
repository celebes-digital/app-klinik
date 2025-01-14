@php
    $headers = [
        ['key' => 'no', 'label' => '#', 'class' => 'w-4'],
        ['key' => 'kode_tindakan', 'label' => 'Kode', 'class' => 'w-12 flex-shrink'],
        ['key' => 'nama_tindakan', 'label' => 'Tindakan Medis', 'class' => 'w-44 grow'],
        ['key' => 'harga_satuan', 'label' => 'Harga Satuan', 'class' => 'w-12'],
        ['key' => 'harga_dasar', 'label' => 'Harga Dasar', 'class' => 'w-12'],
        ['key' => 'actions', 'label' => 'Aksi', 'class' => 'w-24'],
    ];
@endphp

<div class="flex space-x-8">
    <x-card class="flex-shrink w-full w md:w-2/3 h-fit" title="Daftar Tindakan Medis" separator>
        <x-table 
            :headers="$headers" 
            :rows="$tindakan_medis"
            show-empty-text 
            empty-text="Belum ada data"
        >
            @scope('cell_no', $tindakan_medis)
                {{ $loop->index + 1 }}
            @endscope

            
            @scope('cell_actions', $tindakan_medis)
                <div class="flex gap-2 w-fit">
                    <x-button 
                        label="Edit"
                        icon="o-pencil-square" 
                        type="button"
                        wire:click="setData('{{ $tindakan_medis->kode_tindakan }}', 'edit')" 
                        spinner 
                        class="font-normal btn-sm btn-warning" 
                    />
                    <x-button 
                        label="Hapus"
                        type="button"
                        icon="o-trash" 
                        wire:click="delete('{{ $tindakan_medis->kode_tindakan }}')" 
                        spinner 
                        class="font-normal btn-sm btn-error" 
                    />
                </div>
            @endscope
        </x-table>
    </x-card>

    <div
        class="flex-shrink w-full p-6 space-y-3 md:w-1/3 h-fit bg-gray-300/10"
        wire:loading
        wire:target.except="save, delete"
    >
        <div class="w-full h-12 mb-8 skeleton"></div>
        <div class="h-4 w-44 skeleton"></div>
        <div class="w-full h-10 skeleton"></div>
        <div class="h-4 w-44 skeleton"></div>
        <div class="w-full h-10 skeleton"></div>
        <div class="flex justify-end w-full">
            <div class="w-20 h-10 skeleton"></div>
        </div>
    </div>

    <x-card 
        title="{{$form->tindakanMedis ? 'Edit' : 'Tambah'}} Tindakan Medis"
        wire:loading.remove 
        wire:target.except="save, delete" 
        class="flex-shrink w-full md:w-1/3 h-fit" 
    >
        <x-form wire:submit="save" wire:target="submit" no-separator>
            <x-input 
                label="Kode" 
                wire:model="form.kode_tindakan" 
                maxlength="8" 
                hint="Berisi 8 digit karakter huruf atau angka" 
            />
            <x-input 
                label="Nama Tindakan" 
                wire:model="form.nama_tindakan" 
            />

            <div class="grid grid-cols-2 gap-4">
                <x-input 
                    label="Harga Satuan" 
                    wire:model="form.harga_satuan" 
                />
                <x-input 
                    label="Harga Dasar" 
                    wire:model="form.harga_dasar" 
                />
            </div>
            
            <x-slot:actions>
            <div class="flex justify-end mt-4 space-x-2">
                <x-button 
                    type="button" 
                    class="btn-warning" 
                    label="Reset"
                    wire:click="resetForm" 
                />
                <x-button 
                    type="submit" 
                    class="btn-primary" 
                    label="Simpan {{$form->tindakanMedis ? 'Perubahan' : ''}}" 
                />
            </div>
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
