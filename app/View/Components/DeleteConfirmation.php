<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteConfirmation extends Component
{
    public function __construct(
        public string $title = "Yakin ingin menghapus data ini?",
        public ?string $label = "Data ini akan dihapus secara permanen.",
        public string $icon = 'o-trash',
        public ?string $iconActionDelete = null,
        public ?string $iconActionDeleteRight = null,

        public ?bool $backdrop = true,

        // Slots
        public ?string $button = null,
        public ?string $actions = null
    ) {
        //
    }

    public function functionDelete(): ?string
    {
        return $this->attributes->whereStartsWith('confirm:delete')->first();
    }

    public function render(): View|Closure|string
    {
        return <<<'HTML'
                    <div
                        x-data="{
                            open: false,

                            deleteData() {
                            console.log('Delete data');
                                $wire.{{$functionDelete()}};
                                open = false;
                            }
                        }"
                    >
                        @if($button)
                            {{ $button }}
                        @else
                            <x-button 
                                icon="o-trash" 
                                @click="open = true" 
                                spinner 
                                class="btn-sm btn-error" 
                            />
                        @endif
                        <div>
                            <dialog
                                {{ 
                                    $attributes->except('wire:model')->class([
                                        "modal",
                                        "backdrop-blur" => $backdrop,
                                    ]) 
                                }}
                                :class="{'modal-open !animate-none': open}"
                                :open="open"
                                @keydown.escape.window = "open = false"
                            >
                                <div class="modal-box">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="p-4 border rounded-full bg-error/15 border-error">
                                            <x-mary-icon :name="$icon" class="w-12 text-error" />
                                        </div>
                                        
                                        <div class="mt-2">
                                            <h1 class="text-lg font-semibold">{{ $title }}</h1>
                                            <p class="flex justify-center mt-1 text-sm text-center">"{{ $label }}"</p>
                                        </div>

                                        <div class="modal-action">
                                            <x-button label="Batal" @click="open = false" />
                                            
                                            <button
                                                type="button"
                                                class="normal-case btn btn-error"
                                                @click="deleteData"
                                                wire:target="{{ $functionDelete }}"
                                                wire:loading.attr="disabled"
                                            >

                                                <!-- SPINNER LEFT -->
                                                @if(!$iconActionDeleteRight)
                                                    <span 
                                                        wire:loading 
                                                        wire:target="{{ $functionDelete() }}" 
                                                        class="w-5 h-5 loading loading-spinner"></span>
                                                @endif

                                                <!-- ICON -->
                                                @if($iconActionDelete)
                                                    <span 
                                                        class="block"
                                                        wire:loading.class="hidden" 
                                                        wire:target="{{ $functionDelete() }}" 
                                                    >
                                                        <x-mary-icon :name="$icon" />
                                                    </span>
                                                @endif

                                                <span>
                                                    Hapus
                                                </span>

                                                <!-- ICON RIGHT -->
                                                @if($iconActionDeleteRight)
                                                    <span 
                                                        class="block" 
                                                        wire:loading.class="hidden" 
                                                        wire:target="{{ $functionDelete() }}" 
                                                    >
                                                        <x-mary-icon :name="$iconActionDeleteRight" />
                                                    </span>
                                                @endif

                                                @if($iconActionDeleteRight)
                                                    <span 
                                                        wire:loading 
                                                        wire:target="{{ $functionDelete() }}" 
                                                        class="w-5 h-5 loading loading-spinner"
                                                    ></span>
                                                @endif
                                            </button>
                                        </div>
                                    </div>
                                </div>
    
                                <form class="modal-backdrop" method="dialog">
                                    <button @click="open = false" type="button">close</button>
                                </form>
                            </dialog>
                        </div>
                    </div>
                HTML;
    }
}
