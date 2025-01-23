@php 
    $headers = [
        ['key' => 'no', 'label' => '#', 'class' => 'w-8'],
        ['key' => 'nama_poli', 'label' => 'Nama Poli'],
        ['key' => 'tarif_dasar', 'label' => 'Tarif Dasar', 'format' => ['currency', '0..', 'IDR ']],
        ['key' => 'tarif_konsultasi', 'label' => 'Tarif Konsultasi', 'format' => ['currency', '0..', 'IDR ']],
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
                        class="btn-sm btn-warning" 
                    />
                    <x-delete-confirmation 
                        confirm:delete="delete({{ $poli->id_poli }})" 
                        :label="$poli->nama_poli"
                    />
                </div>
            @endscope

            <x-slot:empty>
                <x-atoms.empty-state label="Belum ada data poliklinik" />
            </x-slot:empty>
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
                    option-value="kode_provinsi"
                    option-label="nama_provinsi"
                    placeholder="Pilih Provinsi"
                    placeholder-value=""
                    wire:model.change="form.provinsi" 
                />
        
                <x-select 
                    label="Kabupaten"
                    icon="o-map"
                    :options="$filteredKabupaten"
                    option-value="kode_kabupaten"
                    option-label="nama_kabupaten"
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
                    option-value="kode_kecamatan"
                    option-label="nama_kecamatan"
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
                    option-value="kode_kelurahan"
                    option-label="nama_kelurahan"
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
</div>
