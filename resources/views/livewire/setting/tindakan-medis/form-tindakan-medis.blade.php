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
    <x-card 
        title="{{$form->tindakanMedis ? 'Edit' : 'Tambah'}} Tindakan Medis"
        wire:loading.remove 
        wire:target.except="save" 
        class="h-fit" 
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

            <x-select 
                label="Poliklinik" 
                placeholder="Pilih poliklinik (Default umum)"
                icon="o-building-library" 
                :options="$poliklinik"
                option-value="id_poli"
                option-label="nama_poli" 
                wire:model="form.id_poliklinik" 
            />

            <div class="grid grid-cols-2 gap-4">
                <x-input 
                    label="Harga Satuan" 
                    wire:model="form.harga_satuan" 
                    prefix="IDR"
                    x-mask:dynamic="$money($input, ',', '.', 0)"
                />
                <x-input 
                    label="Harga Dasar" 
                    wire:model="form.harga_dasar" 
                    prefix="IDR"
                    x-mask:dynamic="$money($input, ',', '.', 0)"
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

    <div
        class="w-full p-6 space-y-4 h-fit bg-gray-300/10"
        wire:loading
        wire:target.except="save"
    >
        <div class="h-12 mb-8 w-52 skeleton"></div>
        <div class="h-4 w-44 skeleton"></div>
        <div class="w-full h-10 skeleton"></div>
        <div class="h-4 w-44 skeleton"></div>
        <div class="w-full h-10 skeleton"></div>
        <div class="h-4 w-44 skeleton"></div>
        <div class="w-full h-10 skeleton"></div>
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-4">
                <div class="w-24 h-4 skeleton"></div>
                <div class="w-full h-10 skeleton"></div>
            </div>
            <div class="space-y-4">
                <div class="w-24 h-4 skeleton"></div>
                <div class="w-full h-10 skeleton"></div>
            </div>
        </div>
        <div class="flex justify-end w-full">
            <div class="w-20 h-10 skeleton"></div>
        </div>
    </div>
</div>
