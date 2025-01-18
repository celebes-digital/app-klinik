<div>
    <x-header 
        title="Pemeriksaan Fisik"
        size="text-lg" 
        class="!mb-4 mt-8 bg-primary/5 py-2 px-4 rounded" 
    />
    <div class="grid grid-cols-2 px-4 gap-x-4 gap-y-8">
        @foreach ($pemeriksaanFisik as $itemPemeriksaan)
            <div>
                <div class="pt-0 font-semibold !text-base label label-text">
                    {{ ucwords(str_replace('_', ' ', $itemPemeriksaan)) }}
                </div>
                <div class="flex items-center space-x-1">
                    <label class="cursor-pointer label">
                        <input type="radio" name="radio-10" class="radio checked:bg-red-500" checked="checked" />
                        <span class="ml-2 label-text">Normal</span>
                    </label>
                    <label class="cursor-pointer label">
                        <input type="radio" name="radio-10" class="radio checked:bg-red-500" checked="checked" />
                        <span class="ml-2 label-text">Abnormal</span>
                    </label>
                    <div class="grow">
                        <x-input label="Keterangan" wire:model="form.mata" inline />
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>