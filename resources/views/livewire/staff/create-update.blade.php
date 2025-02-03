<div>
    <x-slot:headerActions>
        <div x-data>
            <x-button icon="o-arrow-uturn-left" label="Kembali" class="btn-seccondary font-bold" link="/staff"></x-button>
        </div>
    </x-slot:headerActions>
    <x-card shadow separator>
        <x-form wire:submit="save" wire:target="submit">
            <x-header title="Input Data Staff" subtitle="Data dengan simbol (*) wajib diisi!" size="text-xl" />

            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-6">
                    <x-input label="NIK" wire:model="form.nik">
                        <x-slot:append>
                            <x-button label="Cari Staff Satu Sehat" 
                                icon="o-check" 
                                class="btn-success text-white rounded-s-none" 
                                wire:click="getByNik"
                            />
                        </x-slot:append>
                    </x-input>
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-input label="Nomor (STR)" wire:model="form.no_str" />
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-input label="Nomor IHS" wire:model="form.ihs" />
                </div>

                <div class="col-span-12 md:col-span-6">
                    <x-input label="Nama" wire:model="form.nama"  />
                </div>

                <div class="col-span-12 md:col-span-6">
                    <x-input label="Nomor Telepon" wire:model="form.no_telp"  />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-datepicker label="Tanggal Lahir" wire:model="form.tgl_lahir" icon="o-calendar" :config="$tanggal_format"  />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-select label="Jenis Kelamin" :options="$kelamin" wire:model="form.kelamin"  />
                </div>

                <div class="col-span-12 md:col-span-6">
                    <x-input label="Alamat" wire:model="form.alamat" />
                </div>
            </div>

            <x-slot:actions>
                <x-button label="Simpan Data" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
