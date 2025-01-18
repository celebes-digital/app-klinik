
<div>
    <x-header 
        title="Anamnesis - Keluhan Awal"
        size="text-2xl" 
        class="!mb-4" 
        separator
    />
    <div class="space-y-6">
        <x-textarea
            label="Keluhan Utama"
            wire:model="form.keluhan_utama"
            placeholder="Tuliskan keluhan utama pasien"
            rows="2"
        />
        <x-textarea
            label="Keluhan Penyerta"
            wire:model="form.keluhan_penyerta"
            placeholder="Tuliskan keluhan penyerta pasien"
            rows="2"
        />
        <x-textarea
            label="Riwayat Penyakit Sekarang"
            wire:model="form.riwayat_penyakit_sekarang"
            placeholder="Tuliskan riwayat penyakit sekarang pasien"
            rows="2"
        />
        <x-textarea
            label="Riwayat Penyakit Terdahulu"
            wire:model="form.riwayat_penyakit_terdahulu"
            placeholder="Tuliskan riwayat penyakit terdahulu pasien"
            rows="2"
        />
        <x-textarea
            label="Riwayat Penyakit Keluarga"
            wire:model="form.riwayat_penyakit_keluarga"
            placeholder="Tuliskan riwayat penyakit keluarga pasien"
            rows="2"
        />
        <x-textarea
            label="Riwayat Alergi"
            wire:model="form.riwayat_alergi"
            placeholder="Tuliskan riwayat alergi pasien"
            rows="2"
        />
        <x-textarea
            label="Riwayat Pengobatan"
            wire:model="form.riwayat_pengobatan"
            placeholder="Tuliskan riwayat pengobatan pasien"
            rows="2"
        />
    </div>
</div>
