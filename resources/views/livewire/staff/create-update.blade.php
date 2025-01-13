<div>
    <x-header title="Staff" separator />

    <x-card shadow separator>
        <x-form wire:submit="save" wire:target="submit">
            <x-header title="Input Data Staff" subtitle="Data dengan simbol (*) wajib diisi!" size="text-xl" />

            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-3">
                    <x-input label="Nama Pasien" wire:model="form.nama"  />
                </div>

                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <x-input label="NIK" wire:model="form.nik"  />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-datepicker label="Tanggal Lahir" wire:model="form.tgl_lahir" icon="o-calendar" :config="$tanggal_format"  />
                </div>

                <div class="col-span-6 md:col-span-3">
                    <x-select label="Jenis Kelamin" :options="$kelamin" wire:model="form.kelamin"  />
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-input label="Nomor Telepon" wire:model="form.no_telp"  />
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-input label="Alamat" wire:model="form.alamat" />
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-input label="Nomor Surat Tanda Registrasi (STR)" wire:model="form.no_str" />
                </div>

                <div class="col-span-12 md:col-span-3">
                    <x-input label="Nomor IHS" wire:model="form.ihs" />
                </div>
            </div>

            <x-slot:actions>
                <x-button label="Simpan Data" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
