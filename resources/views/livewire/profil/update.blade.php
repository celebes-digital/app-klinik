@php
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
@endphp

<div>
    <x-card>
        <x-form wire:submit="save" no-separator>
            <x-tabs wire:model="selectedTab">
                {{-- Informasi Umum --}}
                <x-tab name="umum" label="Informasi Umum" icon="o-building-office-2">
                    <div class="flex flex-col gap-8 md:flex-row">
                        <div class="flex-shrink-0 w-52">
                            {{-- <x-file wire:model="logo" accept="image/png" crop-after-change     change-text="Change"
                                crop-text="Crop"
                                crop-title-text="Crop image"
                                crop-cancel-text="Cancel"
                                crop-save-text="Crop"
                            >
                                <img src="{{ $user->avatar ?? 'https://placehold.co/400' }}" class="h-full rounded-lg" />
                            </x-file> --}}
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
