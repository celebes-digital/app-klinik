<div>
    <x-header 
        title="Diagnosis (ICD-10)"
        size="text-lg" 
        class="!mb-4 mt-8 bg-primary/5 py-2 px-4 rounded" 
    />
    <div 
        x-data="{
            focused: false,
            searchAble: false,

            focus() {
                this.focused = true
                this.$refs.inputSearch.focus()
            },

            clear() {
                this.$refs.inputSearch.value = ''
                this.focused = false
            },

            searchOptions(value, event) {
                if(value.length < 3) {
                    this.searchAble = false;
                    return;
                }

                this.searchAble = true;
                @this.search(value)
            },
        }"
    >
        <div class="grid grid-cols-2 gap-4">
            <div @click.away="clear()">
                <div
                    @click="focus()"
                    x-ref="container" 
                    class="relative flex-1 cursor-pointer"
                >
                    <input
                        @keyup.esc="clear()"
                        x-ref="inputSearch"
                        @input.debounce.500="focus()"
                        @keydown.arrow-down.prevent="focus()"
                        @keydown.debounce.500="searchOptions($el.value, $event)"
                        
                        placeholder="Cari berdasarkan kode ICD-10 atau nama diagnosis"
                        class="w-full outline-none input input-primary peer pe-10"
                    />
                    <x-mary-icon 
                        name="o-magnifying-glass" 
                        class="absolute text-gray-400 -translate-y-1/2 pointer-events-none top-1/2 end-3" 
                    />
                </div>
                
                {{-- Options --}}
                <div x-cloak class="relative" x-show="focused">
                    <div 
                        class="absolute z-10 w-full border rounded shadow-xl cursor-pointer top-2 bg-base-100 border-base-300"
                        x-anchor.bottom.start="$refs.container"
                    >
                        <!-- Minimal searching -->
                        <div x-show="!searchAble" class="p-2">
                            <span class="block w-full p-2 text-gray-400 bg-gray-100 rounded">
                                Masukkan minimal tiga karakter untuk mencari
                            </span>
                        </div>

                        <!-- Loading Progress -->
                        <div
                            wire:loading
                            wire:target="search"
                            class="w-full px-2 pt-2"
                        >
                            <div class="flex items-center w-full p-2 text-gray-400 bg-gray-100 rounded">
                                Mencari data yang sesuai...
                            </div>
                            <progress 
                                class="h-1 -inset-y-2 progress progress-primary">
                            </progress>
                        </div>

                        <!-- No Results -->
                        @if ($diagnosisOptions->isEmpty())
                            <div 
                                wire:loading.remove
                                wire:target="search" 
                                x-show="searchAble" 
                                class="w-full p-2"
                            >
                                <span class="block w-full p-2 text-gray-400 bg-gray-100 rounded">
                                    Tidak ada hasil yang ditemukan
                                </span>
                            </div>
                        @endif

                        <!-- Result -->
                        <div
                            wire:loading.remove
                            wire:target="search" 
                            x-show="searchAble" 
                            class="w-full overflow-y-auto max-h-96"
                        >
                            @foreach ($diagnosisOptions as $item)
                                <div 
                                    class="flex items-center justify-between p-2 hover:bg-gray-100">
                                    <div class="text-lg">
                                        {{ $item->display }}
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="px-1 text-base rounded text-primary bg-primary/5">
                                            {{$item->code}}
                                        </span>
                                        @if (in_array($item->code, array_column($selectedOption, 'code')))
                                            <x-button
                                                icon-right="o-arrow-right-circle" 
                                                class="cursor-not-allowed btn-primary btn-sm" 
                                                disabled
                                            />
                                            @else
                                            <x-button
                                                wire:click="addDiagnosis('{{$item->code}}')" 
                                                icon-right="o-arrow-right-circle" 
                                                class="btn-primary btn-sm" 
                                                spinner="addDiagnosis('{{$item->code}}')"
                                            />
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                @if (empty($selectedOption))
                    <div class="flex items-center justify-center w-full py-4 rounded-lg text-slate-400 bg-slate-400/10">
                        <span>
                            <x-icon name="s-inbox" class="w-8 h-8" />
                            Belum ada data diagnosis
                        </span>
                    </div>
                @else
                    @foreach ($selectedOption as $key => $item)
                        <div 
                            class="flex items-center justify-between p-2 bg-gray-100 rounded">
                            <div class="text-lg">
                                {{$item['display']}}
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="px-1 text-base rounded text-primary bg-primary/5">
                                    {{$item['code']}}
                                </span>
                                <x-button 
                                    icon-right="o-trash" 
                                    class="btn-error btn-sm" 
                                    wire:click="removeDiagnosis({{$key}})"
                                    spinner="removeDiagnosis({{$key}})" 
                                />
                            </div>
                        </div>
                    @endforeach
                    <div>
                        <x-button
                            label="Simpan"
                            class="btn-primary"
                        />
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
