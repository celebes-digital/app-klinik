
<div class="grid gap-6 md:grid-cols-3">
    <x-card title="Detail Pasien" class="h-fit">
        <div class="grid grid-cols-3">
            <div class="space-y-2">
                <div class="font-semibold">Nama</div>
                <div>No. IHS</div>
                <div>NIK</div>
                <div>Kelamin</div>
                <div>Tanggal Lahir</div>
            </div>
            <div class="col-span-2 space-y-2">
                <div class="font-semibold">: {{ $pasien->nama }} </div>
                <div>: {{ $pasien->no_bpjs }}</div>
                <div>: {{ $pasien->nik }}</div>
                <div>: {{ $pasien->kelamin }}</div>
                <div>: {{ $pasien->tgl_lahir }}</div>
            </div>
        </div>
    </x-card>
    <x-card 
        title="Tambah Kunjungan" 
        class="col-span-2" 
        subtitle="Tanggal Kunjungan: {{ $form->tgl_kunjungan }}"
        separator
    >
        <x-slot:menu class="space-x-4">
            <span class="badge badge-primary badge-lg">No. Kunjungan {{$form->no_kunjungan}}</span>
        </x-slot:menu>

        <x-form wire:submit="store">
            <div class="grid gap-4 md:grid-cols-2">
                <div class="space-y-4">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <x-datetime 
                                label="Tanggal Kunjungan" 
                                wire:model="form.tgl_kunjungan" 
                                type="datetime-local" 
                                disabled
                            />
                        </div>
                        <div>
                            <x-select 
                                label="Poliklinik" 
                                icon="o-building-library" 
                                option-value="id_poli"
                                option-label="nama_poli"
                                placeholder="Pilih Poliklinik"
                                :options="$poli" 
                                wire:model="form.id_poli" 
                            />
                        </div>
                    </div>
    
                    <div class="col-span-2">
                        <x-select 
                            label="Dokter" 
                            icon="o-user" 
                            option-value="id_tenaga_medis"
                            option-label="nama"
                            placeholder="Pilih Dokter"
                            :options="$dokter" 
                            wire:model="form.id_tenaga_medis" 
                        />
                    </div>
    
                </div>
                <div class="">
                    <x-textarea
                        label="Keluhan Awal"
                        wire:model="form.keluhan_awal"
                        hint="Max 1000 chars"
                        rows="4"
                    />
                </div>
            </div>
            
            <x-slot:actions>
                <x-button 
                    label="Batal" 
                    color="secondary" 
                    wire:click="cancel" 
                />
                <x-button 
                    label="Simpan" 
                    class="btn-primary" 
                    wire:click="save" 
                    spinner
                />
            </x-slot:actions>
        </x-form>
    </x-card> 
</div>
