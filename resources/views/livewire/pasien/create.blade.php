<div>
    <x-header title="Tambah Pasien" separator />

    <x-card>
        <x-form wire:submit="save" wire:target="submit">
            <x-header title="Input Data Pasien" subtitle="Data dengan simbol (*) wajib diisi!" size="text-xl" />

            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-6">
                    <x-input label="NIK" wire:model="form.nik">
                        <x-slot:append>
                            <x-button label="Cari Pasien Satu Sehat" 
                                icon="o-check" 
                                class="btn-success text-white rounded-s-none" 
                                wire:click="getByNik"
                            />
                        </x-slot:append>
                    </x-input>
                </div>

                <div class="col-span-12 sm:col-span-6 md:col-span-6">
                    <x-input label="NIK Ibu" wire:model="form.nik_ibu">
                        <x-slot:append>
                            <x-button label="Cari Pasien Bayi Satu Sehat" 
                                icon="o-check" 
                                class="btn-success text-white rounded-s-none" 
                                wire:click="getByNikIbu"
                            />
                        </x-slot:append>
                    </x-input>
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-input label="Nama Pasien" wire:model="form.nama"  />
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-input label="Nomor BPJS" wire:model="form.no_bpjs"  />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-input label="Tempat Lahir" wire:model="form.tempat_lahir"  />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-datepicker label="Tanggal Lahir" wire:model="form.tgl_lahir" icon="o-calendar" :config="$tanggal_format"  />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-select label="Jenis Kelamin" :options="$kelamin" wire:model="form.kelamin"  />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-select label="Status Nikah" :options="$status_nikah" wire:model="form.status_nikah"  />
                </div>
                
                <div class="col-span-12 md:col-span-3">
                    <x-input label="Alamat" wire:model="form.alamat" />
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-select label="Lahir Kembar" :options="$lahir_kembar" wire:model="form.lahir_kembar" />
                </div>

                <h3 class="col-span-12 gap-1 font-bold text-lg" size="text-xl">
                    Detail Pasien 
                </h3>

                <div class="col-span-4 md:col-span-2">
                    <x-input
                        label="Kode Pos"
                        wire:model="formDetail.kode_pos"
                    />
                </div>

                <div class="col-span-4 md:col-span-1">
                    <x-input
                        label="RT"
                        wire:model="formDetail.rt"
                    />
                </div>

                <div class="col-span-4 md:col-span-1">
                    <x-input
                        label="RW"
                        wire:model="formDetail.rw"
                    />
                </div>

                <div class="col-span-6 md:col-span-2">
                    <x-select 
                        label="Provinsi"
                        icon="o-map"
                        :options="$filteredProvinsi"
                        option-value="id"
                        option-label="name"
                        placeholder="Pilih Provinsi"
                        placeholder-value=""
                        wire:model.live.debounce.1ms="formDetail.provinsi" 
                    />
                </div>

                <div class="col-span-6 md:col-span-2">
                    <x-select 
                        label="Kabupaten"
                        icon="o-map"
                        :options="$filteredKabupaten"
                        option-value="id"
                        option-label="name"
                        placeholder="Pilih Kabupaten"
                        placeholder-value=""
                        wire:model.live.debounce.1ms="formDetail.kabupaten" 
                    />
                </div>

                <div class="col-span-6 md:col-span-2">
                    <x-select 
                        label="Kecamatan"
                        icon="o-map"
                        :options="$filteredKecamatan"
                        option-value="id"
                        option-label="name"
                        placeholder="Pilih Kecamatan"
                        placeholder-value=""
                        wire:model.live.debounce.1ms="formDetail.kecamatan" 
                    />
                </div>

                <div class="col-span-6 md:col-span-2">
                    <x-select 
                        label="Kelurahan"
                        icon="o-map"
                        :options="$filteredKelurahan"
                        option-value="id"
                        option-label="name"
                        placeholder="Pilih Kelurahan"
                        placeholder-value=""
                        wire:model.live.debounce.1ms="formDetail.kelurahan" 
                    />
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-input label="Nomor Telepon" wire:model="formDetail.no_telp"  />
                </div>

                <div class="col-span-3">
                    <x-input label="Email" wire:model="formDetail.email" />
                </div>

                <div class="col-span-3">
                    <x-input label="Pekerjaan" wire:model="formDetail.pekerjaan" />
                </div>

                <div class="col-span-3">
                    <x-input label="Pendidikan" wire:model="formDetail.pendidikan" />
                </div>

                <div class="col-span-3">
                    <x-input label="Kewarganegaraan" wire:model="formDetail.kewarganegaraan" />
                </div>

            </div>

            <x-slot:actions>
                <x-button label="Simpan Data" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
