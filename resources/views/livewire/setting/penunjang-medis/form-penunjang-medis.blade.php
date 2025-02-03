<div>
    <x-card 
        title="{{$form->penunjangMedis ? 'Edit' : 'Tambah'}} Penunjang Medis"
        wire:loading.remove 
        wire:target.except="save, delete" 
        class="h-fit" 
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
                    spinner="save"
                />
            </div>
            </x-slot:actions>
        </x-form>
    </x-card>

    {{-- Skeleton --}}
    <div
        class="w-full p-6 space-y-3 h-fit bg-gray-300/10"
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
</div>
