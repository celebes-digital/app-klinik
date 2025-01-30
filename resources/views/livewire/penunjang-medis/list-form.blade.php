@php
    $headers = [
        ['key' => 'no', 'label' => '#', 'class' => 'w-8'],
        ['key' => 'kode_penunjang', 'label' => 'Kode', 'class' => 'w-12 flex-shrink'],
        ['key' => 'nama_penunjang', 'label' => 'Penunjang Medis', 'class' => 'w-64 grow'],
        ['key' => 'actions', 'label' => 'Aksi', 'class' => 'w-24'],
    ];
@endphp

<div class="flex space-x-8">
    <x-card class="flex-shrink w-full md:w-3/5 h-fit" title="Daftar Penunjang Medis" separator>
        <x-table 
            :headers="$headers" 
            :rows="$penunjang_medis"
            show-empty-text 
            empty-text="Belum ada data"
        >
            @scope('cell_no', $penunjang_medis)
                {{ $loop->index + 1 }}
            @endscope

            
            @scope('cell_actions', $penunjang_medis)
                <div class="flex gap-2 w-fit">
                    <x-button 
                        {{-- label="Edit" --}}
                        icon="o-pencil-square" 
                        type="button"
                        wire:click="setData('{{ $penunjang_medis->kode_penunjang }}', 'edit')" 
                        tooltip="Edit"
                        spinner 
                        class="font-normal btn-sm btn-warning" 
                    />
                    <x-button 
                        {{-- label="Hapus" --}}
                        type="button"
                        icon="o-trash" 
                        wire:click="delete('{{ $penunjang_medis->kode_penunjang }}')" 
                        tooltip="Delete"
                        spinner 
                        class="font-normal btn-sm btn-error" 
                    />
                    <x-button 
                        {{-- label="Detail" --}}
                        type="button"
                        icon="o-arrow-down-on-square" 
                        link="penunjang-medis/{{ $penunjang_medis->kode_penunjang }}"
                        tooltip="Daftar Pemeriksaan"
                        spinner 
                        class="font-normal btn-sm btn-info" 
                    />
                </div>
            @endscope
        </x-table>
    </x-card>

    <div
        class="flex-shrink w-full p-6 space-y-3 md:w-2/5 h-fit bg-gray-300/10"
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
        title="{{$form->penunjangMedis ? 'Edit' : 'Tambah'}} Penunjang Medis"
        wire:loading.remove 
        wire:target.except="save, delete" 
        class="flex-shrink w-full md:w-2/5 h-fit" 
    >
        <x-form wire:submit="save" wire:target="submit" no-separator>
            <x-input 
                label="Kode" 
                wire:model="form.kode_penunjang" 
                maxlength="8" 
                hint="Berisi 8 digit karakter huruf atau angka" 
            />
            <x-input 
                label="Nama Penunjang Medis" 
                wire:model="form.nama_penunjang" 
            />
            
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
                    label="Simpan {{$form->penunjangMedis ? 'Perubahan' : ''}}" 
                />
            </div>
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
