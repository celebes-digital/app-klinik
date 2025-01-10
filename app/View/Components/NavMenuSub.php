<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavMenuSub extends Component
{
    public string $uuid;

    public function __construct(
        public ?string $title = null,
        public ?string $icon = null,
        public bool $open = false,
        // public ?bool $enabled = true,
    ) {
        $this->uuid = "mary" . md5(serialize($this));
    }

    public function render(): View|Closure|string
    {
        // if ($this->enabled === false) {
        //     return '';
        // }

        return <<<'HTML'
                @aware(['activeBgColor' => 'bg-base-300'])

                @php
                    $submenuActive = Str::contains($slot, 'mary-active-menu');
                @endphp

                <li
                    class="relative"
                    x-data="
                    {
                        show: false,
                    }"
                >
                    <details 
                        class="my-0.5" 
                        :open="show" 
                        @click.outside="show = false" 
                    >
                        <summary 
                            x-ref="button" 
                            @click.prevent="show = !show" 
                            @class([
                                "hover:text-inherit text-inherit", 
                                $activeBgColor => $submenuActive
                            ])
                        >
                            @if($icon)
                                <x-mary-icon :name="$icon" class="inline-flex"  />
                            @endif
                            <span class="mary-hideable">{{ $title }}</span>
                        </summary>

                        <ul 
                            @click="open = false"
                            class="absolute mary-hideable p-2 shadow z-[1] border border-base-200 bg-base-100 dark:bg-base-200 rounded-box w-auto min-w-max before:bg-teal-300 before:opacity-100"
                        >
                            <div wire:key="dropdown-slot-{{ $uuid }}">
                                {{ $slot }}
                            </div>
                        </ul>
                    </details>
                </li>
            HTML;
    }
}
