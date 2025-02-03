<div>
    <div
        class="w-full p-6 space-y-3 h-fit bg-gray-300/10"
        wire:loading
        wire:target.except="save, form.provinsi, form.kabupaten, form.kecamatan, form.kelurahan"
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
        wire:loading.remove 
        wire:target.except="save, form.provinsi, form.kabupaten, form.kecamatan, form.kelurahan"
        class="h-fit" 
        title="{{$idPoli ? 'Ubah' : 'Tambahkan'}} Poliklinik"
    >
        <x-form wire:submit.prevent="save" no-separator>
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <x-input label="Nama Poliklinik" wire:model="form.nama_poli" />
                </div>
                <x-input 
                    label="Tarif Dasar" 
                    wire:model="form.tarif_dasar"
                    prefix="IDR"
                    x-mask:dynamic="$money($input, ',', '.', 0)"
                />
                <x-input 
                    label="Tarif Konsultasi" 
                    wire:model="form.tarif_konsultasi"
                    prefix="IDR"
                    x-mask:dynamic="$money($input, ',', '.', 0)"
                />
            </div>
        
            <x-slot:actions>
                <x-button wire:click="resetForm" class="btn-warning">Reset</x-button>
                <x-button type="submit" class="btn-primary" spinner>Simpan</x-button>
            </x-slot:actions>
        </x-form>
    </x-card>
</div>