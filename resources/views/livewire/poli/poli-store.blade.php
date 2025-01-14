<div class="col-span-4">
    
    <div
        class="w-full p-6 space-y-3 h-fit bg-gray-300/10"
        wire:loading
        wire:target.except="save"
    >
        <div class="w-full h-12 mb-8 skeleton"></div>
        <div class="h-4 w-44 skeleton"></div>
        <div class="w-full h-10 skeleton"></div>
        <div class="h-4 w-44 skeleton"></div>
        <div class="w-full h-10 skeleton"></div>
        <div class="h-4 w-44 skeleton"></div>
        <div class="h-10 w-96 skeleton"></div>
        <div class="flex justify-end w-full">
            <div class="w-20 h-10 skeleton"></div>
        </div>
    </div>

    <x-card 
        wire:loading.remove 
        wire:target.except="save"
        class="h-fit" 
        title="{{$idPoli ? 'Ubah' : 'Tambahkan'}} Poliklinik"
    >
        <x-slot:menu x-show="{{$idPoli ? 'false' : 'true'}}">
            <x-button 
            icon="o-map-pin" 
            label="Gunakan Lokasi Puskesmas" 
            class="btn-sm btn-outline btn-info" 
            wire:click="setLokasi()" 
            />
        </x-slot:menu>
        <x-form wire:submit.prevent="save" no-separator>
            <div class="grid gap-4 md:grid-cols-6 lg:grid-cols-12">
                <div class="lg:col-span-6">
                    <x-input label="Nama Poliklinik" wire:model="form.nama_poli" />
                </div>
                <div class="lg:col-span-3">
                    <x-input label="Email" wire:model="form.email" />
                </div>
                <div class="lg:col-span-3">
                    <x-input label="Nomor Telepon" wire:model="form.no_telp" />
                </div>
        
                <div class="col-span-3">
                    <x-select 
                        label="Provinsi"
                        icon="o-map"
                        :options="$filteredProvinsi"
                        option-value="id"
                        option-label="name"
                        placeholder="Pilih Provinsi"
                        placeholder-value=""
                        wire:model.live.debounce.1ms="form.provinsi" 
                    />
                </div>
        
                <div class="col-span-3">
                <x-select 
                    label="Kabupaten"
                    icon="o-map"
                    :options="$filteredKabupaten"
                    option-value="id"
                    option-label="name"
                    placeholder="Pilih Kabupaten"
                    placeholder-value=""
                    wire:model.live.debounce.1ms="form.kabupaten" 
                />
                </div>
        
                <div class="col-span-3">
                    <x-select 
                        label="Kecamatan"
                        icon="o-map"
                        :options="$filteredKecamatan"
                        option-value="id"
                        option-label="name"
                        placeholder="Pilih Kecamatan"
                        placeholder-value=""
                        wire:model.live.debounce.1ms="form.kecamatan" 
                    />
                </div>
        
                <div class="col-span-3">
                    <x-select 
                        label="Kelurahan"
                        icon="o-map"
                        :options="$filteredKelurahan"
                        option-value="id"
                        option-label="name"
                        placeholder="Pilih Kelurahan"
                        placeholder-value=""
                        wire:model.live.debounce.1ms="form.kelurahan" 
                    />
                </div>
        
                <div class="col-span-5">
                    <x-input label="Alamat" wire:model="form.alamat" icon="o-map-pin" />
                </div>
        
                <div class="col-span-2">
                    <x-input label="Kode Pos" wire:model="form.kode_pos" />
                </div>
            </div>
        
            <x-slot:actions>
                <x-button type="submit" class="btn-primary">Simpan</x-button>
            </x-slot:actions>
        </x-form>
    </x-card>
</div>