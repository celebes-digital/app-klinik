@php 
    $headers = [
        ['key' => 'no', 'label' => '#', 'class' => 'w-8'],
        ['key' => 'no_kunjungan', 'label' => 'No. Kunjungan'],
        ['key' => 'pasien.nama', 'label' => 'Nama Pasien'],
        ['key' => 'tenaga_medis.nama', 'label' => 'Nama Dokter'],
        ['key' => 'poliklinik.nama_poli', 'label' => 'Poli'],
        ['key' => 'tgl_kunjungan', 'label' => 'Tanggal Kunjungan'],
        ['key' => 'status', 'label' => 'Status'],
        ['key' => 'action', 'label' => 'Aksi'],
    ];
@endphp

<div>
    <x-card title="Daftar Antrian" class="p-1 lg:p-4">
        
        <x-slot:menu>
            <x-button 
                class="btn-primary"
                link="/kunjungan"
            >
                Tambah Kunjungan
            </x-button.primary>
        </x-slot:menu>
        
        <x-table 
            :headers="$headers" 
            :rows="$antrian" 
            with-pagination 
            striped
            per-page="perPage" 
            :per-page-values="[5, 10, 20]" 
        >
            @scope('cell_no', $antrian)
                {{ ($this->getPage() - 1) * $this->perPage + $loop->index + 1 }}
            @endscope
            
            @scope('cell_status', $antrian)
                <span
                    class="font-semibold badge badge-md"
                    :class="{
                        'badge-warning': '{{ $antrian->status }}' === 'menunggu',
                        'badge-info': '{{ $antrian->status }}' === 'diperiksa',
                        'badge-success': '{{ $antrian->status }}' === 'selesai',
                        'badge-error': '{{ $antrian->status }}' === 'batal',
                    }" 
                >
                    {{ Str::ucfirst($antrian->status) }}
                </span>
            @endscope
            
            @scope('cell_action', $antrian)
                <div class="flex gap-2">
                    <x-button 
                        icon="o-clipboard-document-list" 
                        link="/pemeriksaan/poliklinik/{{ $antrian->no_kunjungan }}/view"
                        spinner 
                        class="btn-sm btn-warning" 
                    />
                </div>
            @endscope
        </x-table>
        
    </x-card>
</div>
