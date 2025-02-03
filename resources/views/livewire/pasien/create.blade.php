@php
    $headers = [
        ['key' => 'id', 'label' => 'ID IHS'],
        ['key' => 'name', 'label' => 'Nama'],
        ['key' => 'birthdate', 'label' => 'Tanggal Lahir'],
        ['key' => 'kembar', 'label' => 'Lahir Kembar'],
        ['key' => 'action', 'label' => 'Action'],
    ];
@endphp

<div>
    <x-slot:headerActions>
        <div x-data>
            <x-button icon="o-arrow-uturn-left" label="Kembali" link="/pasien" wire:key />
        </div>
    </x-slot:headerActions>

    <x-card>
        <x-form wire:submit="save" wire:target="submit">
            <x-header :title="$title" subtitle="Data dengan simbol (*) wajib diisi!" size="text-xl" />

            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 lg:col-span-4">
                    <x-input icon="o-identification" label="Nama Pasien" wire:model="form.nama" hint="Sesuai KTP" required />
                </div>

                <div class="col-span-6 lg:col-span-3">
                    <x-select icon="o-finger-print" label="Jenis Kelamin" :options="$kelamin" wire:model="form.kelamin" required />
                </div>

                <div class="col-span-6 lg:col-span-3">
                    <x-datepicker label="Tanggal Lahir" wire:model="form.tgl_lahir" icon="o-calendar" :config="$tanggal_format"
                        required />
                </div>

                <div class="col-span-12 lg:col-span-2 flex items-center">
                    <x-button label="Cari di SATUSEHAT"
                        class="w-full btn-success whitespace-nowrap text-white flex items-center"
                        wire:click="getByNGB" />
                </div>

                <div class="col-span-12">
                    <hr>
                </div>

                <div class="col-span-12 md:col-span-6">
                    <x-input label="NIK" wire:model="form.nik" hint="Isi Jika Pasien Dewasa" />
                </div>

                <div class="col-span-12 md:col-span-6">
                    <x-input label="NIK Ibu" wire:model="form.nik_ibu" hint="Isi Jika Pasien Bayi">
                        <x-slot:append>
                            <x-button label="Cari di SATUSEHAT" icon="o-check"
                                class="btn-success text-white rounded-s-none" wire:click="getByNikIbu" />
                        </x-slot:append>
                    </x-input>
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-input label="Nomor IHS" wire:model="form.no_ihs" required />
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-input label="Nomor BPJS" wire:model="form.no_bpjs" />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-input label="Tempat Lahir" wire:model="form.tempat_lahir" required />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-select label="Lahir Kembar" :options="$lahir_kembar" wire:model="form.lahir_kembar" />
                </div>

                <h3 class="col-span-12 gap-1 font-bold text-lg" size="text-xl">
                    Detail Pasien
                </h3>

                <div class="col-span-12 md:col-span-6">
                    <x-input label="Alamat" wire:model="form.alamat" />
                </div>

                <div class="col-span-4 md:col-span-2">
                    <x-input label="Kode Pos" wire:model="form.kode_pos" />
                </div>

                <div class="col-span-4 md:col-span-2">
                    <x-input label="RT" wire:model="form.rt" />
                </div>

                <div class="col-span-4 md:col-span-2">
                    <x-input label="RW" wire:model="form.rw" />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-select label="Provinsi" icon="o-map" :options="$filteredProvinsi" option-value="id" option-label="name"
                        placeholder="Pilih Provinsi" placeholder-value="" wire:model.change="form.provinsi" />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-select label="Kabupaten" icon="o-map" :options="$filteredKabupaten" option-value="id" option-label="name"
                        placeholder="Pilih Kabupaten" placeholder-value="" wire:loading.attr="disabled"
                        wire:target="form.provinsi" wire:model.change="form.kabupaten" wire:key="form.kabupaten" />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-select label="Kecamatan" icon="o-map" :options="$filteredKecamatan" option-value="id" option-label="name"
                        placeholder="Pilih Kecamatan" placeholder-value="" wire:loading.attr="disabled"
                        wire:target="form.kabupaten" wire:model.change="form.kecamatan" wire:key="form.kecamatan" />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-select label="Kelurahan" icon="o-map" :options="$filteredKelurahan" option-value="id" option-label="name"
                        placeholder="Pilih Kelurahan" placeholder-value="" wire:loading.attr="disabled"
                        wire:target="form.kecamatan" wire:model.change="form.kelurahan" wire:key="form.kelurahan" />
                </div>

                <div class="col-span-12 md:col-span-6">
                    <x-input label="Nomor Telepon" wire:model="form.no_telp" />
                </div>

                <div class="col-span-6 md:col-span-6">
                    <x-input label="Email" wire:model="form.email" />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-select label="Status Nikah" :options="$status_nikah" wire:model="form.status_nikah" />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-input label="Pendidikan" wire:model="form.pendidikan" />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-input label="Kewarganegaraan" wire:model="form.kewarganegaraan" />
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-input label="Pekerjaan" wire:model="form.pekerjaan" />
                </div>

            </div>

            <x-slot:actions>
                <x-button label="Simpan Data" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-card>

    <x-modal wire:model="modalIbu" title="Data yang ditemukan" box-class="max-w-4xl"
        subtitle="Ditemukan {{ $totalAnakIbu }} data orang yang terkait dengan nik {{ $form->nik_ibu }}">

        <x-table :headers="$headers" :rows="$dataAnakIbu" striped>
            @scope('cell_kembar', $item)
                {{ $item['kembar'] == 0 ? 'Tidak' : 'Ya' }}
            @endscope
            @scope('cell_action', $item)
                <x-button label="Pilih"
                    wire:click="selectAnak('{{ $item['id'] }}', '{{ $item['name'] }}', '{{ $item['birthdate'] }}', '{{ $item['kembar'] }}')"
                    spinner class="btn-sm" />
            @endscope
        </x-table>

        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.modalIbu = false" />
        </x-slot:actions>
    </x-modal>
</div>
