@php 
    $headers = [
        ['key' => 'no', 'label' => '#', 'class' => 'w-8'],
        ['key' => 'nama_poli', 'label' => 'Nama Poli'],
        ['key' => 'tarif_dasar', 'label' => 'Tarif Dasar'],
        ['key' => 'tarif_konsultasi', 'label' => 'Tarif Konsultasi'],
        ['key' => 'link', 'label' => 'Link'],
    ];
@endphp

<div class="lg:col-span-3">
    <x-card
        title="Daftar Poliklinik" 
        class="h-fit"
    >
        <x-table :headers="$headers" :rows="$poli">
    
            @scope('cell_no', $poli)
                {{ $loop->index + 1 }}
            @endscope

            @scope('cell_link', $poli)
                <x-button 
                    label="Detail"
                    icon="o-viewfinder-circle" 
                    wire:click="showDetail({{ $poli->id_poli }})" 
                    class="px-0 btn-link btn-sm" 
                    spinner
                />
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
                        wire:click="showDelete({{ $poli->id_poli }})" 
                        spinner 
                        class="btn-sm" 
                    />
                </div>
            @endscope
        </x-table>
    </x-card>

    <x-modal
        title="Detail Lokasi | {{$form->nama_poli}}"
        wire:model="showModalDetail" 
        class="backdrop-blur" 
        boxClass="!w-full !max-w-2xl"
    >
        <x-form wire:submit="updateDetail" no-separator>
            <div class="grid grid-cols-2 gap-4">
                <x-input label="Email" wire:model="form.email" />
                <x-input label="Nomor Telepon" wire:model="form.no_telp" />
                
                <div class="col-span-2">
                    <x-input label="Alamat" wire:model="form.alamat" icon="o-map-pin" />
                </div>
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
                />
        
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
                />
        
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
                />
        
                <div class="w-[80%]">
                    <x-input label="Kode Pos" wire:model="form.kode_pos" />
                </div>
            </div>

            <x-slot:actions>
                <x-button label="Batal" @click="$wire.showModalDetail = false" />
                <x-button spinner="updateDetail" type="submit" class="btn-primary">Simpan</x-button>
            </x-slot:actions>
        </x-form>
    </x-modal>

    <x-modal title="Hapus | {{$form->nama_poli}}" wire:model="showModalDelete" class="backdrop-blur">
        <div class="mb-5">Yakin ingin menghapus data  ini?</div>
        <x-button label="Batal" @click="$wire.showModalDelete = false" />
        <x-button label="Hapus" spinner wire:click="delete" class="btn-error" />
    </x-modal>
</div>
