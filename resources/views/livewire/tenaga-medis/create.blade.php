@php
    $spesialisasi   = App\Models\Spesialisasi::get();
    $poli           = App\Models\Poliklinik::get();
@endphp

<div>
    <x-slot:headerActions>
        <div x-data>
            <x-button 
                icon="o-arrow-uturn-left" 
                label="Kembali"
                link="/tenaga-medis"
                wire:key
            />
            <x-button icon="o-wrench-screwdriver" label="Konfigurasi" class="btn-seccondary font-bold" link="/tenaga-medis/konfigurasi"></x-button>
            <x-button 
                icon="o-plus"
                label="Tambah Tenaga medis"
                class="btn-primary"
                link="/tenaga-medis/create"
                wire:key
            />
        </div>
    </x-slot:headerActions>
    <x-card shadow separator>
        <x-form wire:submit="save" wire:target="submit">
            <x-header title="Input Data Tenaga Medis" subtitle="Data dengan simbol (*) wajib diisi!" size="text-xl" />

            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-6">
                    <x-input label="NIK" wire:model="form.nik" icon="o-identification">
                        <x-slot:append>
                            <x-button label="Cari di SATUSEHAT" 
                                icon="o-check" 
                                class="btn-success text-white rounded-s-none" 
                                wire:click="getByNik"
                            />
                        </x-slot:append>
                    </x-input>
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-input label="Nomor STR" wire:model="form.no_str" />
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-input label="Nomor HIS" wire:model="form.ihs" />
                </div>

                <div class="col-span-12 sm:col-span-4 md:col-span-4">
                    <x-choices-offline
                        label="Spesialisasi"
                        wire:model.live="form.spesialisasi"
                        :disabled="$disabled"
                        :options="$spesialisasi"
                        option-value="id_spesialisasi"
                        option-label="nama"
                        single
                        searchable 
                    />
                </div>

                <div class="col-span-12 md:col-span-4">
                    <x-input label="Nama" wire:model="form.nama" :prefix="$dr" :suffix="$sp"  />
                </div>

                <div class="col-span-12 md:col-span-4">
                    <x-choices-offline
                        label="Pilih Poliklinik"
                        wire:model.live="form.id_poli"
                        :options="$poli"
                        option-value="id_poli"
                        option-label="nama_poli"
                        searchable
                    />
                </div>

                <div class="col-span-12 md:col-span-4">
                    <x-input label="Nomor Telepon" wire:model="form.no_telp" />
                </div>

                <div class="col-span-12 md:col-span-4">
                    <x-input label="Alamat" wire:model="form.alamat" />
                </div>

                <div class="col-span-12 md:col-span-2">
                    <x-datepicker label="Tanggal Lahir" wire:model="form.tgl_lahir" icon="o-calendar" :config="$tanggal_format"  />
                </div>

                <div class="col-span-12 md:col-span-2">
                    <x-select label="Jenis Kelamin" :options="$kelamin" wire:model="form.kelamin"  />
                </div>
            </div>

            <x-slot:actions>
                <x-button label="Simpan Data" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
