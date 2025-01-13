<div>
    <x-header title="Tambah Pasien" separator />

    <x-card>
        <x-form wire:submit="save" wire:target="submit">
            <x-header title="Input Data Pasien" subtitle="Data dengan simbol (*) wajib diisi!" size="text-xl" />

            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-4">
                    <x-input label="Nama Pasien" wire:model="form.nama"  />
                </div>

                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <x-input label="NIK" wire:model="form.nik"  />
                </div>
                
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <x-input label="NIK Ibu" wire:model="form.nik_ibu"  />
                </div>

                <div class="col-span-12 md:col-span-2">
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
                    <x-input
                        label="Alamat"
                        wire:model="form.alamat"
                    />
                </div>
                
                <div class="col-span-12 md:col-span-3">
                    <x-input label="Nomor Telepon" wire:model="form.no_telp"  />
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-select label="Lahir Kembar" :options="$lahir_kembar" wire:model="form.lahir_kembar" />
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-select label="Pasien Hidup" :options="$hidup" wire:model="form.hidup" />
                </div>

                <h3 class="col-span-12 gap-1 font-bold text-lg" size="text-xl">
                    Detail Pasien 
                </h3>

                <div class="col-span-4 md:col-span-2">
                    <x-input
                        label="Kode Pos"
                        wire:model="form.kode_pos"
                    />
                </div>

                <div class="col-span-4 md:col-span-1">
                    <x-input
                        label="RT"
                        wire:model="form.rt"
                    />
                </div>

                <div class="col-span-4 md:col-span-1">
                    <x-input
                        label="RW"
                        wire:model="form.rw"
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
                        wire:model.live.debounce.1ms="form.provinsi" 
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
                        wire:model.live.debounce.1ms="form.kabupaten" 
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
                        wire:model.live.debounce.1ms="form.kecamatan" 
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
                        wire:model.live.debounce.1ms="form.kelurahan" 
                    />
                </div>

                <div class="col-span-3">
                    <x-input label="Email" wire:model="form.email" />
                </div>

                <div class="col-span-3">
                    <x-input label="Pekerjaan" wire:model="form.pekerjaan" />
                </div>

                <div class="col-span-3">
                    <x-input label="Pendidikan" wire:model="form.pendidikan" />
                </div>

                <div class="col-span-3">
                    <x-input label="Kewarganegaraan" wire:model="form.kewarganegaraan" />
                </div>

            </div>

            <x-slot:actions>
                <x-button label="Simpan Data" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
