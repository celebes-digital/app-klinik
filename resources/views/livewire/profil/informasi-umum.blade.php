@php
    // dd($filteredProvinsi);
@endphp

<div>
    <x-form wire:submit="save" no-separator>
        <div class="flex gap-8 md:flex-row">
            <div class="flex-shrink-0 w-52">
                <x-file 
                    label="Logo"
                    wire:model="form.logo" 
                    accept="image/png, image/jpeg" 
                    crop-after-change 
                    change-text="Ganti Logo"
                    crop-text="Ganti"
                    crop-title-text="Pilih area gambar"
                    crop-cancel-text="Batal"
                    crop-save-text="Simpan"
                >
                    <img 
                        src="{{ $form->logo ?? 'https://placehold.co/400' }}" 
                        class="rounded-lg w-52" 
                    />
                </x-file>
            </div>
            <div class="flex-grow">
                <div class="grid gap-4 md:grid-cols-6 lg:grid-cols-12">
                    <div class="col-span-3 lg:col-span-6">
                        <x-input label="Nama Puskesmas" wire:model="form.nama_puskesmas" />
                    </div>
                    <div class="lg:col-span-3">
                        <x-input label="Email" wire:model="form.email" />
                    </div>
                    <div class="lg:col-span-3">
                        <x-input label="Nomor Telepon" wire:model="form.no_telp" />
                    </div>
                    {{-- <x-input label="URL" wire:model="form.url" /> --}}
    
                    <div class="col-span-3">
                        <x-select 
                            label="Provinsi"
                            icon="o-map"
                            :options="$filteredProvinsi"
                            option-value="code"
                            option-label="name"
                            placeholder="Pilih Provinsi"
                            placeholder-value=""
                            wire:model.change="form.provinsi" 
                        />
                    </div>
    
                    <div class="col-span-3">
                    <x-select 
                        label="Kabupaten"
                        icon="o-map"
                        :options="$filteredKabupaten"
                        option-value="code"
                        option-label="name"
                        placeholder="Pilih Kabupaten"
                        placeholder-value=""
                        wire:loading.attr="disabled"
                        wire:target="form.provinsi"
                        wire:model.change="form.kabupaten" 
                        wire:key="form.kabupaten"
                    />
                    </div>
    
                    <div class="col-span-3">
                        <x-select 
                            label="Kecamatan"
                            icon="o-map"
                            :options="$filteredKecamatan"
                            option-value="code"
                            option-label="name"
                            placeholder="Pilih Kecamatan"
                            placeholder-value=""
                            wire:loading.attr="disabled"
                            wire:target="form.kabupaten"
                            wire:model.change="form.kecamatan" 
                            wire:key="form.kecamatan"
                        />
                    </div>
    
                    <div class="col-span-3">
                        <x-select 
                            label="Kelurahan"
                            icon="o-map"
                            :options="$filteredKelurahan"
                            option-value="code"
                            option-label="name"
                            placeholder="Pilih Kelurahan"
                            placeholder-value=""
                            wire:loading.attr="disabled"
                            wire:target="form.kecamatan"
                            wire:model.change="form.kelurahan" 
                            wire:key="form.kelurahan"
                        />
                    </div>
    
                    <div class="col-span-5">
                        <x-input label="Alamat" wire:model="form.alamat" icon="o-map-pin" />
                    </div>
    
                    <div class="col-span-2">
                        <x-input label="Kode Pos" wire:model="form.kode_pos" />
                    </div>
                </div>
            </div>
        </div>
        
        <x-slot:actions>
            <x-button label="Simpan Data" class="btn-primary" wire:dirty.class='disabled' type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>
</div>
