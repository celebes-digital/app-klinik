@php
    $kelamin = [
        [
            'id' => '',
            'name' => 'Pilih Jenis Kelamin',
        ],
        [
            'id' => 'male',
            'name' => 'Laki-laki',
        ],
        [
            'id' => 'female',
            'name' => 'Perempuan'
        ]
    ];

    $users = [
        [
            'custom_key' => '1',
            'other_name' => 'Aceh'
        ],
        [
            'custom_key' => '2',
            'other_name' => 'Sumatera Utara'
        ],
        [
            'custom_key' => '3',
            'other_name' => 'Sumatera Barat'
        ]
    ];

    $config1 = ['altFormat' => 'm/d/Y'];
@endphp

<div>
    <x-header title="Tambah Pasien" separator />

    <x-card>
        <x-form>
            <x-tabs wire:model="selectedTab">
                <x-tab name="umum" label="Data Pasien" icon="o-building-office-2">
                    <x-header title="Input Data Pasien" subtitle="Data dengan simbol (*) wajib diisi!" size="text-xl" />

                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 md:col-span-4">
                            <x-input label="Nama Pasien" wire:model="form.nama" required />
                        </div>

                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <x-input label="NIK" wire:model="form.nik" required />
                        </div>

                        <div class="col-span-12 sm:col-span-6 md:col-span-4">
                            <x-input label="NIK Ibu" wire:model="form.nik_ibu" required />
                        </div>

                        <div class="col-span-12 md:col-span-3">
                            <x-input label="Nomor BPJS" wire:model="form.no_telp" />
                        </div>

                        <div class="col-span-12 md:col-span-3">
                            <x-input label="Tempat Lahir" wire:model="form.nama" required />
                        </div>

                        <div class="col-span-12 md:col-span-3">
                            <x-datepicker label="Tanggal Lahir" wire:model="tanggal_lahir" icon="o-calendar" :config="$config1" />
                        </div>

                        <div class="col-span-12 md:col-span-3">
                            <x-select label="Jenis Kelamin" :options="$kelamin" wire:model="form.kelamin" required />
                        </div>

                        <div class="col-span-6">
                            <x-textarea
                            label="Alamat"
                            wire:model="form.alamat"
                            rows="5"
                            />
                        </div>
                        <div class="col-span-12 grid gap-4 grid-cols-12 md:col-span-6">

                            <div class="col-span-6">
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
                                {{-- <x-choices
                                    label="Provinsi"
                                    wire:model.live.debounce.1ms="form.provinsi" 
                                    :options="$filteredProvinsi"
                                    placeholder="Pilih Provinsi"
                                    single
                                    searchable 
                                /> --}}
                            </div>

                            <div class="col-span-6">
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

                            <div class="col-span-6">
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

                            <div class="col-span-6">
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
                        </div>


                        <div class="col-span-12 md:col-span-6">
                            <x-input label="Nomor Telepon" wire:model="form.no_telp" />
                        </div>
                    </div>
                </x-tab>

                {{-- Satu sehat --}}
                <x-tab name="satu-sehat" label="Satu Sehat" icon="o-link">
                    <x-header title="Data Satu Sehat" subtitle="Data didapat dari satu sehat sebagai bagian dari fasyankes" size="text-xl" />
                    <div class="grid gap-4 md:grid-cols-3">
                        <x-input icon="o-arrow-down-on-square" label="Organization ID" wire:model="form.organization_id" />
                        <x-input icon="o-arrow-down-on-square" label="Client ID" wire:model="form.client_id" />
                        <x-input icon="o-arrow-down-on-square" label="Client Secret" wire:model="form.client_secret" />
                    </div>
                </x-tab>

            </x-tabs>

            <x-slot:actions>
                <x-button label="Simpan Data" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
