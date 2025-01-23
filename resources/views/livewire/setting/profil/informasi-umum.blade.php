
<div>
    <x-form wire:submit="save" no-separator>
        <div class="grid gap-4 md:grid-cols-3 lg:grid-cols-6">
            <div>
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
                        class="w-full rounded-lg" 
                    />
                </x-file>
            </div>
            <div class="md:col-span-2 lg:col-span-5">
                <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
                    <div class="col-span-2">
                        <x-input label="Nama Puskesmas" wire:model="form.nama_puskesmas" />
                    </div>
                    
                    <x-input label="Email" wire:model="form.email" />
                    <x-input label="Nomor Telepon" wire:model="form.no_telp" />
                    <x-select 
                        label="Provinsi"
                        icon="o-map"
                        :options="$filteredProvinsi"
                        option-value="kode_provinsi"
                        option-label="nama_provinsi"
                        placeholder="Pilih Provinsi"
                        wire:model.live="form.provinsi" 
                    />
                    <x-select 
                        label="Kabupaten"
                        icon="o-map"
                        :options="$filteredKabupaten"
                        option-value="kode_kabupaten"
                        option-label="nama_kabupaten"
                        placeholder="Pilih Kabupaten"
                        wire:target="form.provinsi"
                        wire:loading.attr="disabled"
                        wire:model.live="form.kabupaten" 
                        wire:key="{{$form->provinsi}}"
                    />
                    <x-select 
                        label="Kecamatan"
                        icon="o-map"
                        :options="$filteredKecamatan"
                        option-value="kode_kecamatan"
                        option-label="nama_kecamatan"
                        placeholder="Pilih Kecamatan"
                        wire:loading.attr="disabled"
                        wire:target="form.kabupaten"
                        wire:model.live="form.kecamatan" 
                        wire:key="{{$form->kabupaten}}"
                    />
                    <x-select 
                        label="Kelurahan"
                        icon="o-map"
                        :options="$filteredKelurahan"
                        option-value="kode_kelurahan"
                        option-label="nama_kelurahan"
                        placeholder="Pilih Kelurahan"
                        wire:loading.attr="disabled"
                        wire:target="form.kecamatan"
                        wire:model.live="form.kelurahan" 
                        wire:key="{{$form->kecamatan}}"
                    />
                    <div class="col-span-2">
                        <x-textarea label="Alamat" wire:model="form.alamat" icon="o-map-pin" />
                    </div>
                    <x-input label="Kode Pos" wire:model="form.kode_pos" />
                </div>
            </div>
        </div>
        
        <x-slot:actions>
            <x-button label="Simpan Data" class="btn-primary" wire:dirty.class='disabled' type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>
</div>
