<div>
    <x-card>
        <x-form wire:submit="save" wire:target="submit">
            <x-header title="Input Data Pasien" subtitle="Data dengan simbol (*) wajib diisi!" size="text-xl" />

            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-4">
                    <x-input label="Nama Pasien" wire:model="form.nama" hint="Nama Sesuai KTP" />
                </div>
                
                <div class="col-span-6 md:col-span-3">
                    <x-select label="Jenis Kelamin" :options="$kelamin" wire:model="form.kelamin" />
                </div>
                
                <div class="col-span-6 md:col-span-3">
                    <x-datepicker label="Tanggal Lahir" wire:model="form.tgl_lahir" icon="o-calendar" :config="$tanggal_format"  />
                </div>

                <div class="col-span-6 md:col-span-2 flex items-center">
                    <x-button class="btn-success w-full h-14 border-green-600 text-white" label="Cari di SATUSEHAT" wire:click="getByNGB" icon="o-check" />
                </div>

                <div class="col-span-12">
                    <hr>
                </div>
                
                <div class="col-span-12 sm:col-span-6 md:col-span-6">
                    <x-input label="NIK Ibu" wire:model="form.nik_ibu">
                        <x-slot:append>
                            <x-button label="Cari di SATUSEHAT" 
                            icon="o-check" 
                            class="btn-success text-white rounded-s-none" 
                            wire:click="getByNikIbu"
                            />
                        </x-slot:append>
                    </x-input>
                </div>

                <div class="col-span-12 sm:col-span-6 md:col-span-6">
                    <x-input label="NIK" wire:model="form.nik" />
                </div>

                <div class="col-span-12 md:col-span-6">
                    <x-input label="Nomor BPJS" wire:model="form.no_bpjs"  />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-input label="Tempat Lahir" wire:model="form.tempat_lahir"  />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-select label="Lahir Kembar" :options="$lahir_kembar" wire:model="form.lahir_kembar" />
                </div>

                <h3 class="col-span-12 gap-1 font-bold text-lg" size="text-xl">
                    Detail Pasien 
                </h3>

                <div class="col-span-12 md:col-span-5">
                    <x-input label="Alamat" wire:model="formDetail.alamat" />
                </div>
                
                <div class="col-span-4 md:col-span-3">
                    <x-input
                        label="Kode Pos"
                        wire:model="formDetail.kode_pos"
                    />
                </div>

                <div class="col-span-4 md:col-span-2">
                    <x-input
                        label="RT"
                        wire:model="formDetail.rt"
                    />
                </div>

                <div class="col-span-4 md:col-span-2">
                    <x-input
                        label="RW"
                        wire:model="formDetail.rw"
                    />
                </div>
                
                <div class="md:col-span-3">
                    <x-select 
                        label="Provinsi"
                        icon="o-map"
                        :options="$filteredProvinsi"
                        option-value="id"
                        option-label="name"
                        placeholder="Pilih Provinsi"
                        placeholder-value=""
                        wire:model.change="formDetail.provinsi" 
                    />
                </div>

                <div class="md:col-span-3">
                    <x-select 
                        label="Kabupaten"
                        icon="o-map"
                        :options="$filteredKabupaten"
                        option-value="id"
                        option-label="name"
                        placeholder="Pilih Kabupaten"
                        placeholder-value=""
                        wire:loading.attr="disabled"
                        wire:target="formDetail.provinsi"
                        wire:model.change="formDetail.kabupaten" 
                        wire:key="formDetail.kabupaten"
                    />
                </div>

                <div class="md:col-span-3">
                    <x-select 
                        label="Kecamatan"
                        icon="o-map"
                        :options="$filteredKecamatan"
                        option-value="id"
                        option-label="name"
                        placeholder="Pilih Kecamatan"
                        placeholder-value=""
                        wire:loading.attr="disabled"
                        wire:target="formDetail.kabupaten"
                        wire:model.change="formDetail.kecamatan" 
                        wire:key="formDetail.kecamatan"
                    />
                </div>

                <div class="md:col-span-3">
                    <x-select 
                        label="Kelurahan"
                        icon="o-map"
                        :options="$filteredKelurahan"
                        option-value="id"
                        option-label="name"
                        placeholder="Pilih Kelurahan"
                        placeholder-value=""
                        wire:loading.attr="disabled"
                        wire:target="formDetail.kecamatan"
                        wire:model.change="formDetail.kelurahan" 
                        wire:key="formDetail.kelurahan"
                    />
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-input label="Nomor Telepon" wire:model="formDetail.no_telp"  />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-input label="Email" wire:model="formDetail.email" />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-select label="Status Nikah" :options="$status_nikah" wire:model="formDetail.status_nikah"  />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-input label="Pendidikan" wire:model="formDetail.pendidikan" />
                </div>
                
                <div class="col-span-6 md:col-span-3">
                    <x-input label="Kewarganegaraan" wire:model="formDetail.kewarganegaraan" />
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-input label="Pekerjaan" wire:model="formDetail.pekerjaan" />
                </div>

            </div>

            <x-slot:actions>
                <x-button label="Simpan Data" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
