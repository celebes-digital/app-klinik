<div>
    <x-header 
        title="Pemeriksaan Fisik"
        size="text-lg" 
        class="!mb-4 mt-8 bg-primary/5 py-2 px-4 rounded" 
    />
    <div class="grid grid-cols-2 gap-8 px-4">
        @foreach ($pemeriksaanFisik as $itemPemeriksaan)
            <div>
                <div class="pt-0 font-semibold !text-base label label-text">
                    <label>
                        {{ ucwords(str_replace('_', ' ', $itemPemeriksaan)) }}
                    </label>
                    <span 
                        class="text-red-500 cursor-pointer" 
                        wire:dirty wire:target="formPemeriksaanFisik.pemeriksaan_fisik.{{ $itemPemeriksaan }}" wire:click="unsetData('{{ $itemPemeriksaan }}')"
                    >
                        <x-icon name="o-x-mark" />
                        Bersihkan
                    </span>
                </div>
                <div class="flex items-center space-x-1">
                    <label class="cursor-pointer label">
                        <input
                            type="radio" 
                            wire:model="formPemeriksaanFisik.pemeriksaan_fisik.{{ $itemPemeriksaan }}.pemeriksaan" 
                            class="radio checked:bg-red-500" 
                            value="Normal" 
                        />
                        <span class="ml-2 label-text">Normal</span>
                    </label>
                    <label class="cursor-pointer label">
                        <input 
                            type="radio" 
                            wire:model="formPemeriksaanFisik.pemeriksaan_fisik.{{ $itemPemeriksaan }}.pemeriksaan" 
                            class="radio checked:bg-red-500" 
                            value="Abnormal" 
                        />
                        <span class="ml-2 label-text">Abnormal</span>
                    </label>
                    <div class="grow">
                        <x-input 
                            label="Keterangan" 
                            wire:model="formPemeriksaanFisik.pemeriksaan_fisik.{{ $itemPemeriksaan }}.keterangan" inline 
                        />
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="flex justify-end my-4">
        <x-button
            label="Simpan"
            class="btn-primary"
            wire:click="save"
        />
    </div>
</div>