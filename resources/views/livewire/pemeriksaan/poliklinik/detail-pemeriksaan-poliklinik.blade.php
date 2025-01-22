<div>
    <x-card 
        title="Data Kunjungan | {{$kunjungan->pasien->nama}}" 
        class="col-span-2" 
        separator
    >
        <x-slot:subtitle>
            Tanggal Kunjungan: 
            <span class="font-semibold text-black">
                {{ \Carbon\Carbon::parse($kunjungan->tgl_kunjungan)->format('d F Y H:i') }}
            </span>
        </x-slot:subtitle>
        <x-slot:menu>
            <span
                class="font-semibold badge badge-md"
                :class="{
                    'badge-warning': '{{ $kunjungan->status }}' === 'menunggu',
                    'badge-info': '{{ $kunjungan->status }}' === 'diperiksa',
                    'badge-success': '{{ $kunjungan->status }}' === 'selesai',
                    'badge-error': '{{ $kunjungan->status }}' === 'batal',
                }" 
            >
                {{ Str::ucfirst($kunjungan->status) }}
            </span>
            <x-badge value="No. Kunjungan {{ $kunjungan->no_kunjungan }}" class="badge-primary badge-lg" />
        </x-slot:menu>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <x-card class="bg-primary/5 h-fit">
                <div class="space-y-4">
                    <x-atoms.place-text 
                        title="Nama Poli" 
                        value="{{ $kunjungan->poliklinik->nama_poli }}" 
                    />
                    <x-atoms.place-text 
                        title="Nama Dokter" 
                        value="{{ $kunjungan->tenaga_medis->nama }}"
                    />
                </div>
            </x-card>
            
            <div class="lg:col-span-2">
                <div class="text-lg font-semibold">Detail Pasien</div>
                <hr class="mt-1 mb-2 border-t border-gray-200">
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <x-atoms.place-text 
                        title="Kelamin" 
                        value="{{ $kunjungan->pasien->kelamin == 'male' ? 'Laki-laki' : 'Perempuan' }}"
                    />
                    <x-atoms.place-text 
                        title="Umur" 
                        value="{{ $kunjungan->pasien->tgl_lahir }}"
                    />
                    <x-atoms.place-text 
                        title="Tanggal Lahir" 
                        value="{{ $kunjungan->pasien->tgl_lahir }}"
                    />
                </div>
            </div>
        </div>
    </x-card>
</div>
